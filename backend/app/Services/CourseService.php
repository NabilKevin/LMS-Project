<?php

namespace App\Services;

use App\CourseStatusFilter;
use App\Http\Resources\CoursesResource;
use App\Models\ClassAssignment;

class CourseService
{
    private const PER_PAGE = 10;

    public function getCourses(
        int $classId,
        int $studentProfileId,
        int $page,
        string $search,
        string $status
    ): array {
        $search = $this->escapeLikeWildcards(trim($search));
        $statusFilter = CourseStatusFilter::fromRequest($status);

        $inner = ClassAssignment::query()
            ->where('class_id', $classId)
            ->when($search !== '', function ($query) use ($search) {
                $query->whereHas('teacher_course.course', function ($q) use ($search) {
                    $q->whereLike('name', "%{$search}%");
                });
            })
            ->withCount('class_topic_contents as total_topics')
            ->withCount([
                'class_topic_contents as completed_topics' => function ($q) use ($studentProfileId) {
                    $q->whereHas('student_progresses', function ($sq) use ($studentProfileId) {
                        $sq->where('student_profile_id', $studentProfileId)
                            ->where('is_completed', true);
                    });
                },
            ]);

        $query = ClassAssignment::query()
            ->fromSub($inner, 'class_assignments')
            ->with(['teacher_course.teacher_profile', 'teacher_course.course', 'class_topic_contents']);

        match ($statusFilter) {
            CourseStatusFilter::Completed => $query
                ->where('total_topics', '>', 0)
                ->whereColumn('completed_topics', '=', 'total_topics'),

            CourseStatusFilter::NotCompleted => $query->where(function ($q) {
                $q->where('total_topics', 0)
                    ->orWhereColumn('completed_topics', '<', 'total_topics');
            }),

            CourseStatusFilter::All => null,
        };

        $paginator = $query->paginate(
            perPage: self::PER_PAGE,
            page: max(1, $page)
        );

        return [
            'data' => $paginator->getCollection(),
            'total' => $paginator->total(),
        ];
    }

    public function getCourse(int $classId, int $studentProfileId, string $slug)
    {
        $totalTopic = 0;
        $totalSubTopic = 0;

        // 1. INNER QUERY: agregat total_topics & completed_topics via withCount,
        // dibungkus fromSub agar bisa dipakai di WHERE (Postgres-safe) jika nanti
        // butuh filter status di endpoint ini juga.
        $inner = ClassAssignment::query()
            ->where('class_id', $classId)
            ->when($slug !== '', function ($query) use ($slug) {
                $query->whereHas('teacher_course.course', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })
            ->withCount('class_topic_contents as total_topics')
            ->withCount([
                'class_topic_contents as completed_topics' => function ($q) use ($studentProfileId) {
                    $q->whereHas('student_progresses', function ($sq) use ($studentProfileId) {
                        $sq->where('student_profile_id', $studentProfileId)
                            ->where('is_completed', true);
                    });
                },
            ]);

        $query = ClassAssignment::query()
            ->fromSub($inner, 'class_assignments')
            ->with([
                'teacher_course.teacher_profile',
                'teacher_course.course',
                'class_topic_contents.topic_content.topic',
                // PERBAIKAN: scope student_progresses ke siswa yang login saja,
                // bukan semua siswa di kelas — mencegah data bocor & boros memori.
                'class_topic_contents.student_progresses' => fn ($q) =>
                $q->where('student_profile_id', $studentProfileId),
                'class',
            ]);

        $classAssignments = $query->get();

        // 2. Transform setiap class_assignment: group class_topic_contents flat
        // menjadi struktur nested topics -> sub_materi, hitung status selesai
        // per materi & progress keseluruhan.
        $result = $classAssignments->map(function ($assignment) use(&$totalTopic, &$totalSubTopic) {
            $topics = $assignment->class_topic_contents
                ->sortBy(fn ($ctc) => $ctc->topic_content->order_number) // urutan sub materi sesuai kurikulum
                ->groupBy(fn ($ctc) => $ctc->topic_content->topic_id)
                ->map(function ($items)  use(&$totalTopic, &$totalSubTopic) {
                    $topic = $items->first()->topic_content->topic;

                    $subMateri = $items->map(function ($ctc) {
                        // Karena student_progresses sudah di-scope ke 1 siswa,
                        // cukup cek apakah ada satu baris dengan is_completed = true.
                        $isCompleted = $ctc->student_progresses
                                ->firstWhere('is_completed', true) !== null;

                        return [
                            'id' => $ctc->topic_content_id,
                            'name'             => $ctc->topic_content->title,
                            'slug'   => $ctc->topic_content->slug,
                            'order'   => $ctc->topic_content->order_number,
                            'content_format'   => $ctc->topic_content->format,
                            'is_completed'     => $isCompleted,
                        ];
                    })->values();

                    $totalTopic += 1;
                    $totalSubTopic += $subMateri->count();
                    return [
                        'id'     => $topic->id,
                        'topic_name'   => $topic->name,
                        'topic_order'  => $topic->order_number,
                        // Materi selesai HANYA jika SEMUA sub materi selesai.
                        'is_completed' => $subMateri->every(fn ($sm) => $sm['is_completed']),
                        'sub_topic'   => $subMateri,
                    ];
                })
                ->sortBy('topic_order') // urutan materi sesuai kurikulum
                ->values();

            // Progress keseluruhan dihitung dari total_topics/completed_topics
            // hasil withCount di inner query — TIDAK dihitung ulang manual di sini,
            // supaya konsisten dengan angka yang sudah divalidasi di level SQL.
            $overallProgress = $assignment->total_topics > 0
                ? round(($assignment->completed_topics / $assignment->total_topics) * 100, 2)
                : 0.0;

            return [
                'id' => $assignment->id,
                'course_name'         => $assignment->teacher_course->course->name,
                'class_name'          => $assignment->class->name,
                'teacher_name'        => $assignment->teacher_course?->teacher_profile?->formatted_name ?? '',
                'progress'    => $overallProgress,
                'total_topics' => $totalTopic,
                'total_sub_topics' => $totalSubTopic,
                'topics'              => $topics,
            ];
        });

        return $result->toArray();
    }

    private function escapeLikeWildcards(string $value): string
    {
        return addcslashes($value, '%_');
    }
}

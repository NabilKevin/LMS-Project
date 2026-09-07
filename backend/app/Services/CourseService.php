<?php

namespace App\Services;

use App\Http\Resources\CourseResource;
use App\Models\ClassAssignment;

class CourseService
{
    private const PER_PAGE = 10;

    /**
     * @return array{data: \Illuminate\Support\Collection, total: int}
     */
    public function getCourses(
    int $classId,
    int $studentProfileId,
    int $page,
    string $search,
    string $status
): array {
    $search = $this->escapeLikeWildcards(trim($search));

    $inner = ClassAssignment::query()
        ->where('class_id', $classId)
        ->whereHas('teacher_course.course', function ($q) use ($search) {
            $q->whereLike('name', "%{$search}%");
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
        ]);

    match ($status) {
        'completed' => $query
            ->where('total_topics', '>', 0)
            ->whereColumn('completed_topics', '=', 'total_topics'),

        'not completed' => $query->where(function ($q) {
            $q->where('total_topics', 0)
              ->orWhereColumn('completed_topics', '<', 'total_topics');
        }),

        default => null, 
    };

    $paginator = $query->paginate(self::PER_PAGE, ['*'], 'page', max(1, $page));

    $paginator->getCollection()->transform(function (ClassAssignment $assignment) {
        $assignment->progress = $assignment->total_topics > 0
            ? round(($assignment->completed_topics / $assignment->total_topics) * 100, 2)
            : 0;

        return $assignment;
    });

    return [
        'data' => $paginator->getCollection(),
        'total' => $paginator->total(),
    ];
}

    /**
     * Escape karakter wildcard LIKE ('%', '_') agar input user
     * tidak bisa memanipulasi pola pencarian.
     */
    private function escapeLikeWildcards(string $value): string
    {
        return addcslashes($value, '%_');
    }
}

<?php

namespace App\Services;

use App\Http\Resources\CourseResource;
use App\Models\ClassAssignment;

class CourseService
{
    public function __construct()
    {
    }

    public function getCourses(int $classId, int $studentProfileId)
    {
        return ClassAssignment::query()
            ->where('class_id', $classId)
            ->with([
                'teacher_course.teacher_profile',
                'teacher_course.course',
            ])

            ->withCount('class_topic_contents as total_topics')
            ->withCount([
                'class_topic_contents as completed_topics' => function ($query) use ($studentProfileId) {
                    $query->whereHas('student_progresses', function ($q) use ($studentProfileId) {
                        $q->where('student_profile_id', $studentProfileId)
                            ->where('is_completed', true);
                    });
                },
            ])
            ->get()

            ->each(function (ClassAssignment $assignment) {
                $assignment->progress = $assignment->total_topics > 0
                    ? round(($assignment->completed_topics / $assignment->total_topics) * 100, 2)
                    : 0;
            });
    }
}

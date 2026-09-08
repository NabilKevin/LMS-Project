<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->teacher_course->course->name,
            'slug' => $this->teacher_course->course->slug,
            'academic_year' => $this->academic_year,
            'teacher_name' => $this->teacher_course?->teacher_profile?->formatted_name ?? '',
            'progress' => $this->progress
        ];
    }
}

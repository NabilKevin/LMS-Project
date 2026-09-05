<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    protected $guarded = ['id'];

    public function teacher_profile()
    {
        return $this->belongsTo(TeacherProfile::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

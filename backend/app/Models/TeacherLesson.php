<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherLesson extends Model
{
    protected $guarded = ['id'];

    public function teacher()
    {
        return $this->belongsTo(TeacherProfile::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

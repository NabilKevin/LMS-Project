<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassAssignment extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function class()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teacher_course()
    {
        return $this->belongsTo(TeacherCourse::class);
    }

    public function class_topic_contents()
    {
        return $this->hasMany(ClassTopicContent::class);
    }
}

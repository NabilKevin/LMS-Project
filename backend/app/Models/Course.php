<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function class_assignments()
    {
        return $this->hasMany(ClassAssignment::class);
    }

    public function teacher_courses()
    {
        return $this->hasMany(TeacherCourse::class);
    }
}

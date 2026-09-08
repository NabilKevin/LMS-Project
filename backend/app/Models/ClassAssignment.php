<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        return $this->hasMany(ClassTopicContent::class, 'class_assignment_id');
    }

    protected function progress(): Attribute
    {
        return Attribute::get(function () {
            if (empty($this->total_topics)) {
                return 0.0;
            }

            return round(($this->completed_topics / $this->total_topics) * 100, 2);
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassTopicContent extends Model
{
    protected $guarded = ['id'];

    public function class_assignment()
    {
        return $this->belongsTo(ClassAssignment::class, 'class_assignment_id');
    }

    public function topic_content()
    {
        return $this->belongsTo(TopicContent::class, 'topic_content_id');
    }

    public function exam_period()
    {
        return $this->belongsTo(ExamPeriod::class, 'exam_period_id');
    }

    public function student_progresses()
    {
        return $this->hasMany(StudentProgress::class);
    }
}

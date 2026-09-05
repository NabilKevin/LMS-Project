<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MajorCourse extends Model
{
    protected $guarded = ['id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

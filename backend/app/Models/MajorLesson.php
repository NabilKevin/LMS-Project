<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MajorLesson extends Model
{
    protected $guarded = ['id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

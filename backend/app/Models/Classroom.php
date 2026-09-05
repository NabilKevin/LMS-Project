<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'classes';

    public function students()
    {
        return $this->hasMany(StudentProfile::class);
    }
}

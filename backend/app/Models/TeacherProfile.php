<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherProfile extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedNameAttribute(): string
    {
        $prefix = trim($this->title_prefix ?? '');
        $name   = trim($this->full_name ?? '');
        $suffix = trim($this->title_suffix ?? '');

        $result = $prefix !== '' ? "{$prefix} {$name}" : $name;
        return $suffix !== '' ? "{$result}, {$suffix}" : $result;
    }
}

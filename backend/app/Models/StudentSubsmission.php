<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSubsmission extends Model
{
    protected $guarded = ['id'];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}

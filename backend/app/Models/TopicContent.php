<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicContent extends Model
{
    protected $guarded = ['id'];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}

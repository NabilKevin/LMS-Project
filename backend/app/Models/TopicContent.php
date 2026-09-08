<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicContent extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function class_topic_contents()
    {
        return $this->hasMany(ClassTopicContent::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}

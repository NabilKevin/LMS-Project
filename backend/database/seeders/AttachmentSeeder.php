<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Topic;
use App\Models\TopicContent;
use Illuminate\Database\Seeder;

class AttachmentSeeder extends Seeder
{
    public function run(): void
    {
        Attachment::create([
            'attachable_type' => TopicContent::class,
            'attachable_id' => TopicContent::first()->id,
            'file_name' => '4a8f1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a',
            'file_path' => '/lesson_materials/4a8f1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a.pptx',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'file_size' => 2386892,
        ]);
    }
}

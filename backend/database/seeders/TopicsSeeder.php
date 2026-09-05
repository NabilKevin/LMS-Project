<?php

namespace Database\Seeders;

use App\Models\ClassTopicContent;
use App\Models\Topic;
use App\Models\TopicContent;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    public function run(): void
    {
        Topic::create([
            'course_id' => 6,
            'name' => 'Pancasila sebagai Sumber Edukasi Karakter dan Ideologi Negara',
            'order_number' => 1,
        ]);

        TopicContent::create([
            'topic_id' => 1,
            'content_type' => 'material_center',
            'title' => '',
            'slug' => '',
            'content' => '',
            'order_number' => 1,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 1,
            'is_visible' => true,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 2,
            'topic_content_id' => 1,
            'is_visible' => true,
        ]);
    }
}

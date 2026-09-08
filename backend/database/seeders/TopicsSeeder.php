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
            'course_id' => 5,
            'name' => 'Pancasila sebagai Sumber Edukasi Karakter dan Ideologi Negara',
            'order_number' => 1,
        ]);
        Topic::create([
            'course_id' => 1,
            'name' => 'Calculus',
            'order_number' => 1,
        ]);
        Topic::create([
            'course_id' => 1,
            'name' => 'Diskrit',
            'order_number' => 2,
        ]);
        Topic::create([
            'course_id' => 1,
            'name' => 'Aljabar Linear',
            'order_number' => 3,
        ]);

        // -----------------------------------------------------------------------------------

        TopicContent::create([
            'topic_id' => 1,
            'source' => 'center',
            'category' => 'material',
            'format' => 'slide',
            'title' => 'Pancasila sebagai Sumber Edukasi Karakter dan Ideologi Negara Di Indonesia',
            'slug' => 'pancasila_sebagai_sumber_Edukasi_karakter_dan_ideologi_negara_di_ndonesia',
            'content' => '',
            'order_number' => 1,
        ]);
        
        TopicContent::create([
            'topic_id' => 2,
            'source' => 'center',
            'category' => 'material',
            'format' => 'text',
            'title' => 'Fungsi',
            'slug' => 'fungsi',
            'content' => '',
            'order_number' => 1,
        ]);

        TopicContent::create([
            'topic_id' => 2,
            'source' => 'center',
            'category' => 'material',
            'format' => 'text',
            'title' => 'Limit',
            'slug' => 'limit',
            'content' => '',
            'order_number' => 2,
        ]);

        TopicContent::create([
            'topic_id' => 2,
            'source' => 'center',
            'category' => 'material',
            'format' => 'text',
            'title' => 'Turunan',
            'slug' => 'turunan',
            'content' => '',
            'order_number' => 3,
        ]);

        TopicContent::create([
            'topic_id' => 3,
            'source' => 'center',
            'category' => 'material',
            'format' => 'text',
            'title' => 'Himpunan',
            'slug' => 'himpunan',
            'content' => '',
            'order_number' => 1,
        ]);

        TopicContent::create([
            'topic_id' => 4,
            'source' => 'center',
            'category' => 'material',
            'format' => 'text',
            'title' => 'Matriks',
            'slug' => 'matriks',
            'content' => '',
            'order_number' => 1,
        ]);

        TopicContent::create([
            'topic_id' => 4,
            'source' => 'center',
            'category' => 'material',
            'format' => 'text',
            'title' => 'Ruang Vektor',
            'slug' => 'ruang_vektor',
            'content' => '',
            'order_number' => 2,
        ]);

        // -----------------------------------------------------------------------------------

        // PKN
        ClassTopicContent::create([
            'class_assignment_id' => 5,
            'topic_content_id' => 1,
            'is_visible' => true,
        ]);

        // Matematika Kelas Lain
        ClassTopicContent::create([
            'class_assignment_id' => 6,
            'topic_content_id' => 1,
            'is_visible' => true,
        ]);

        // Matematika
        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 2,
            'is_visible' => true,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 3,
            'is_visible' => true,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 4,
            'is_visible' => true,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 5,
            'is_visible' => true,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 6,
            'is_visible' => true,
        ]);

        ClassTopicContent::create([
            'class_assignment_id' => 1,
            'topic_content_id' => 7,
            'is_visible' => true,
        ]);
    }
}

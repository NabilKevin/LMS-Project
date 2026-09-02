<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel Pengaturan Ujian (Exam Settings)
        Schema::create('exam_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_content_id');
            $table->integer('duration_minutes'); // durasi ujian
            $table->integer('max_attempts'); // jumlah maksimal percobaan
            $table->boolean('show_result_after'); // menampilkan hasil setelah selesai 
            $table->boolean('shuffle_questions'); // acak soal
            $table->timestamps();

            $table->foreign('topic_content_id')->references('id')->on('topic_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_settings');
    }
};

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
        // Tabel Konten Bab per Kelas, Tugas per Kelas, Kuis per Kelas, atau Ujian per Kelas (Class Topic Contents)
        // Digunakan untuk menghubungkan Konten Bab dengan Kelas yang diajarkan oleh Guru di kelas tersebut
        // Bisa juga digunakan jika seorang guru ingin mengajarkan konten bab tertentu di kelas tertentu, maka guru tersebut bisa menentukan konten bab mana yang akan diajarkan di kelas tersebut
        Schema::create('class_topic_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_assignment_id');
            $table->unsignedBigInteger('topic_content_id');
            $table->unsignedBigInteger('exam_period_id')->nullable(); // Hanya di gunakan untuk Ujian Tengah Semester (UTS) dan Ujian Akhir Semester (UAS), untuk menentukan periode ujian tersebut. Ujian Harian (UH) tidak perlu menggunakan kolom.
            $table->boolean('is_visible');
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_until')->nullable();
            $table->timestamps();

            $table->foreign('class_assignment_id')->references('id')->on('class_assignments')->onDelete('cascade');
            $table->foreign('topic_content_id')->references('id')->on('topic_contents')->onDelete('cascade');
            $table->foreign('exam_period_id')->references('id')->on('exam_periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_topic_contents');
    }
};

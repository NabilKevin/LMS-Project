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
        // Tabel Penugasan Kelas (Class Assignments)
        // Digunakan untuk menghubungkan Kelas dengan Guru dan Mata Pelajaran yang diajarkan di kelas tersebut
        // Contoh: Kelas 10 RPL 1 memiliki Guru A mengajar Matematika, Guru B mengajar Fisika, Guru C mengajar Kimia
        // Lalu kolom academic_year digunakan untuk menandai tahun ajaran berapa guru tersebut mengajar di kelas tersebut dan bisa juga sebagai history saja
        Schema::create('class_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            // $table->unsignedBigInteger('lesson_id'); // bisa ambil dari teacher_lesson_id
            $table->unsignedBigInteger('teacher_lesson_id');
            $table->string('academic_year', 9); // Tahun ajaran (2025/2026, 2026/2027, ...)
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('teacher_lesson_id')->references('id')->on('teacher_lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_assignments');
    }
};

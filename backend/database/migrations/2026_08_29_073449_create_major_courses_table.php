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
        // Tabel Jurusan - Mata Pelajaran (Major-Courses)
        // Digunakan untuk menghubungkan Jurusan dengan Mata Pelajaran yang diajarkan di jurusan tersebut
        // Contoh: Jurusan RPL memiliki Mata Pelajaran Matematika, Fisika, Kimia, Biologi
        // Jadi jika jurusan RPL dan AKL memiliki Mata Pelajaran yang sama, maka akan ada 2 record di tabel ini
        // Dengan begitu, setiap jurusan bisa memiliki mata pelajaran yang sama tetapi gurunya berbeda
        Schema::create('major_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('major_courses');
    }
};

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
        // Tabel Sesi Ujian (Student Exam Sessions)
        // Digunakan untuk mencatat sesi ujian yang diikuti oleh siswa, termasuk waktu mulai dan berakhirnya ujian, status selesai atau tidak, serta skor akhir jika sudah selesai
        Schema::create('student_exam_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_profile_id');
            $table->unsignedBigInteger('class_topic_content_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->boolean('is_finished'); // menandakan apakah siswa sudah menyelesaikan ujian atau belum
            $table->boolean('force_submitted'); // jika siswa melakukan kecurangan atau kehabisan waktu maka ujian akan otomatis disubmit oleh sistem
            $table->float('final_score')->nullable();
            $table->timestamps();

            $table->foreign('student_profile_id')->references('id')->on('student_profiles')->onDelete('cascade');
            $table->foreign('class_topic_content_id')->references('id')->on('class_topic_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_exam_sessions');
    }
};

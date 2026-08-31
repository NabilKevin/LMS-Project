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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_content_id')->nullable(); // Diisi JIKA ini file materi/soal dari Guru
            $table->unsignedBigInteger('student_submission_id')->nullable(); // Diisi JIKA ini file tugas dari Murid
            $table->string('file_name');
            $table->string('file_url');
            $table->string('file_type');
            $table->timestamps();

            $table->foreign('topic_content_id')->references('id')->on('topic_contents')->onDelete('cascade');
            $table->foreign('student_submission_id')->references('id')->on('student_submissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};

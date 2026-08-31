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
        // Pengumpulan tugas murid
        Schema::create('student_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_profile_id');
            $table->unsignedBigInteger('class_topic_content_id');
            $table->text('text_answer')->nullable(); // Jawaban murid
            $table->float('score')->nullable();
            $table->enum('submission_method', ['student_direct', 'teacher_manual'])->default('student_direct'); // fungsi dari teacher manual adalah jika ada murid yang kirim tugas direct ke gurunya, misal jika terlambat mengumpulkan dll.
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
        Schema::dropIfExists('student_submissions');
    }
};

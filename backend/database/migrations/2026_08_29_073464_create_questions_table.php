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
        // Tabel Pertanyaan (Questions) 
        // Digunakan untuk menyimpan pertanyaan-pertanyaan yang akan digunakan dalam ujian (exam) atau kuis (Quiz)
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_content_id');
            $table->enum('question_type', ['pg', 'checkbox', 'essay']);
            $table->text('question_text');
            $table->integer('points');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('topic_content_id')->references('id')->on('topic_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

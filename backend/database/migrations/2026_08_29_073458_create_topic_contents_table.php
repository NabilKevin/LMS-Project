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
        // Tabel Konten Bab (Topic Contents)
        Schema::create('topic_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id'); // Masuk ke BAB mana?
            // KATEGORI: apa jenis konten ini secara pedagogis
            $table->enum('category', [
                'material',     // konten belajar (dulu material_center + material_teacher digabung di sini)
                'quiz',
                'daily_exam',
                'midterm_exam', // UTS
                'final_exam',   // UAS
                'assignment',
            ]);

            // SUMBER: hanya relevan kalau category = 'material'
            $table->enum('source', ['center', 'teacher'])->nullable();

            // FORMAT: hanya relevan kalau category = 'material'
            // (quiz/exam/assignment biasanya render UI soal sendiri, tidak butuh format ini)
            $table->enum('format', ['text', 'pdf', 'video', 'slide'])->nullable();

            $table->unsignedBigInteger('author_id')->nullable(); // Di isi jika merupakan materi, kuis, ujian atau tugas dari guru
            $table->string('title');
            $table->string('slug')->unique(); // Slug untuk URL
            $table->text('content')->nullable(); // Isi materi bacaan (Null jika kuis/ujian)

            $table->integer('order_number'); // Urutan materi di dalam Bab tersebut (increment di setiap topik atau bab)
            // contoh
            // Video Pengantar (order_number: 1)
            // Artikel Bacaan Tambahan (order_number: 2)
            // Modul PDF (order_number: 3)
            // Kuis Latihan (order_number: 4)

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_contents');
    }
};

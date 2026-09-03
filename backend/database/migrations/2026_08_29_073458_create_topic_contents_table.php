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
            $table->enum('content_type', [
                'material_center', 
                'material_teacher', 
                'quiz', 
                'daily_exam', // Ulangan harian
                'midterm_exam', // Ujian Akhir Semester
                'final_exam', // Ujian Tengah Semester
                'assignment'
            ]); 
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

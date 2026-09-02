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
        // Tabel Periode Ujian (Exam Periods)
        // Digunakan untuk menentukan periode ujian, misal UTS Ganjil 2026/2027, UAS Genap 2026/2027, dan lain sebagainya.
        Schema::create('exam_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');                              // "UTS Ganjil 2026/2027"
            $table->enum('type', ['midterm_exam', 'final_exam']);
            $table->string('academic_year', 9);                  // "2026/2027"
            $table->date('start_date');                          // tanggal mulai periode UTS/UAS
            $table->date('end_date');                            // tanggal selesai periode UTS/UAS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_periods');
    }
};

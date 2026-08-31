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
        Schema::create('teacher_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_profile_id');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();

            $table->foreign('teacher_profile_id')->references('id')->on('teacher_profiles')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_lessons');
    }
};

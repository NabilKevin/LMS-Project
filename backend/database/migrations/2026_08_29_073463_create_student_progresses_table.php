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
        Schema::create('student_progresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_topic_content_id');
            $table->unsignedBigInteger('student_profile_id');
            $table->boolean('is_completed');
            $table->timestamp('completed_at');
            $table->timestamps();

            $table->foreign('class_topic_content_id')->references('id')->on('class_topic_contents')->onDelete('cascade');
            $table->foreign('student_profile_id')->references('id')->on('student_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_progresses');
    }
};

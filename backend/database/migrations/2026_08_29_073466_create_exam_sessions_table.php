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
        Schema::create('exam_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_profile_id');
            $table->unsignedBigInteger('class_topic_content_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->boolean('is_finished');
            $table->boolean('force_submitted');
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
        Schema::dropIfExists('exam_sessions');
    }
};

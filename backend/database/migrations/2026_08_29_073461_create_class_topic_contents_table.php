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
        Schema::create('class_topic_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_assignment_id');
            $table->unsignedBigInteger('topic_content_id');
            $table->boolean('is_visible');
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_until')->nullable();
            $table->timestamps();

            $table->foreign('class_assignment_id')->references('id')->on('class_assignments')->onDelete('cascade');
            $table->foreign('topic_content_id')->references('id')->on('topic_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_topic_contents');
    }
};

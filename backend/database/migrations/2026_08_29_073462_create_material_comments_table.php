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
        // Tabel Komentar (Material Comments)
        Schema::create('material_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_topic_content_id');
            $table->unsignedBigInteger('user_id');
            $table->text('comment');
            $table->unsignedBigInteger('parent_id')->nullable(); // jika ada isinya maka comment tersebut merupakan reply comment
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('class_topic_content_id')->references('id')->on('class_topic_contents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('material_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_comments');
    }
};

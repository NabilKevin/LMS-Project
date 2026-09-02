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
        // Tabel Jadwal Pelajaran (Schedule Sessions)
        Schema::create('schedule_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_assignment_id');
            $table->tinyInteger('day_of_week'); // Hari apa? (1=Senin, 2=Selasa, dst)
            $table->time('start_time'); // Jam mulai (Misal: 09:00:00)
            $table->time('end_time'); // Jam selesai (Misal: 11:00:00)
            $table->string('room_name', 50)->nullable(); // (Opsional) Ruangan kelas/Link Zoom
            $table->timestamps();

            $table->foreign('class_assignment_id')->references('id')->on('class_assignments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_sessions');
    }
};

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
        Schema::create('progres_belajar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('progres');
            $table->enum('status_selesai', ['belum selesai', 'selesai']);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_belajar');
    }
};

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
            $table->integer('users_id');
            $table->integer('materi_id');
            $table->integer('progres')->default(0);
            $table->enum('status_selesai', ['belum selesai', 'selesai'])->default('belum selesai');
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

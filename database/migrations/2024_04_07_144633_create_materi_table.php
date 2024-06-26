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
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100)->nullable(false);
            $table->string('bg_materi', 50)->nullable(false);
            $table->longText('deskripsi')->nullable(false);
            $table->string('harga', 10)->nullable(false);
            $table->enum('kategori', ['IT', 'desain', 'softskill']);
            $table->enum('level', ['pemula', 'menengah', 'mahir']);
            $table->enum('status', ['draft', 'publik'])->default('draft');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};

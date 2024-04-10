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
        Schema::create('kuis', function (Blueprint $table) {
            $table->id();
            $table->integer('materi_id');
            $table->longText('soal')->nullable(false);
            $table->string('a', 100)->nullable(false);
            $table->string('b', 100)->nullable(false);
            $table->string('c', 100)->nullable(false);
            $table->string('d', 100)->nullable(false);
            $table->string('kunci', 100)->nullable(false);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuis');
    }
};

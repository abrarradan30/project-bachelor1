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
        Schema::create('detail_materi', function (Blueprint $table) {
            $table->id();
            $table->integer('materi_id');
            $table->string('modul', 100)->nullable(false);
            $table->longText('isi_materi')->nullable(false);
            $table->longText('soal')->nullable(); // Tambahkan kolom soal
            $table->string('a', 100)->nullable(); // Tambahkan opsi jawaban A
            $table->string('b', 100)->nullable(); // Tambahkan opsi jawaban B
            $table->string('c', 100)->nullable(); // Tambahkan opsi jawaban C
            $table->string('d', 100)->nullable(); // Tambahkan opsi jawaban D
            $table->string('kunci', 100)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_materi');
    }
};

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
            $table->string('sub_judul', 100)->nullable(false);
            $table->longText('isi_materi')->nullable(false);
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

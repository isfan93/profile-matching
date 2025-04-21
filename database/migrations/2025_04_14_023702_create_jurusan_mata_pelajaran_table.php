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
        Schema::create('jurusan_mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained();
            $table->foreignId('mata_pelajaran_id')->constrained();
            $table->float('bobot')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan_mata_pelajaran');
    }
};

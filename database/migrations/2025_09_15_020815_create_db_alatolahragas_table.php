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
        Schema::create('db_alatolahragas', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_barang');
            $table->string('Status_barang');
            $table->string('Gambar_barang');
            $table->integer('Jumlah_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('db_alatolahragas');
    }
};

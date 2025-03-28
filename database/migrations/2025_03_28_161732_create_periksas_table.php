<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien'); // id_pasien ke tabel users
            $table->foreign('id_pasien')->references('id')->on('users')->onDelete('cascade'); // Ganti pasien -> users
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('users')->onDelete('cascade'); // Ganti juga kalo dokter pakai tabel users
            $table->dateTime('tgl_periksa');
            $table->text('catatan')->nullable();
            $table->integer('biaya_periksa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksas');
    }
};

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
        Schema::table('periksas', function (Blueprint $table) {
            $table->text('hasil_diagnosa')->nullable()->after('biaya'); // Menambahkan kolom hasil_diagnosa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periksas', function (Blueprint $table) {
            //
        });
    }
};

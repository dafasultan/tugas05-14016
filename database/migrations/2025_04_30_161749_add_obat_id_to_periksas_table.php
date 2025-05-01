<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->unsignedBigInteger('obat_id')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropForeign(['obat_id']);
            $table->dropColumn('obat_id');
        });
    }

};

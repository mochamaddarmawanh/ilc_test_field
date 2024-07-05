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
        Schema::create('import_costs', function (Blueprint $table) {
            $table->id('id_simulasi');
            $table->string('kode_barang');
            $table->string('uraian_barang');
            $table->integer('bm');
            $table->float('nilai_komoditas');
            $table->float('nilai_bm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_costs');
    }
};

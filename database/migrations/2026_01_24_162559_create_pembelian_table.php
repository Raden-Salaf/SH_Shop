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
        Schema::create('pembelian', function (Blueprint $table) {
        $table->increments('kode_pembelian');
        $table->string('kode_produk', 20);
        $table->integer('banyak');
        $table->bigInteger('bayar');
        $table->integer('kode_pembeli');
        $table->string('status', 20);

        $table->foreign('kode_produk')
              ->references('kode')
              ->on('produk')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
        $table->string('kode', 22)->primary();
        $table->string('nama', 50);
        $table->string('tipe', 50);
        $table->string('jenis', 50);
        $table->bigInteger('harga');
        $table->integer('stok');
        $table->text('gambar');
    });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }

};

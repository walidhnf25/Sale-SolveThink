<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli')->nullable();
            $table->string('no_pembeli')->nullable();
            $table->string('alamat_pembeli')->nullable();
            $table->text('pembelian')->nullable();
            $table->integer('total_harga')->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->string('bukti_pembayaran_pembeli')->nullable();
            $table->string('pengambilan_barang_pembeli')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}

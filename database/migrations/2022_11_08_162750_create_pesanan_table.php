<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->integer('id_produk');
            $table->integer('id_user');
            $table->integer('quantity');
            $table->integer('harga_total_bayar');
            $table->integer('ongkir');
            $table->integer('total_ongkir');
            $table->text('bukti_bayar')->nullable();
            $table->bigInteger('total_dp')->nullable();
            $table->text('bukti_bayar_dp')->nullable();
            $table->text('bukti_bayar_dp_lunas')->nullable();
            $table->string('dp_status')->nullable();
            $table->string('status')->nullable();
            $table->string('tipe_pembayaran')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
};

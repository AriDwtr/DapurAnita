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
        Schema::create('alamat_user', function (Blueprint $table) {
            $table->bigIncrements('id_alamat');
            $table->integer('id_user');
            $table->string('no_telp');
            $table->string('nama_penerima');
            $table->integer('id_provinsi');
            $table->string('nama_prov');
            $table->integer('id_kota');
            $table->string('nama_kota');
            $table->string('kode_pos')->nullable();
            $table->text('alamat_lengkap');
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
        Schema::dropIfExists('alamat_user');
    }
};

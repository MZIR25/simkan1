<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_gaji', function (Blueprint $table) {
            $table->increments('gaji_id');
            $table->string('Nama_Karyawan')->nullable();
            $table->string('Jabatan')->nullable();
            $table->string('Gaji_Pokok')->nullable();
            $table->string('Status_Menikah')->nullable();
            $table->string('Pajak_Bpjs')->nullable();
            $table->string('Jumlah_Gaji')->nullable();
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
        Schema::dropIfExists('daftar_gaji');
    }
}

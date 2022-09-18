<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_cuti', function (Blueprint $table) {
            $table->increments('cuti_id');
            $table->string('Nama_Karyawan')->nullable();
            $table->string('Jabatan')->nullable();
            $table->string('Alasan_Cuti')->nullable();
            $table->date('Tanggal_Mulai')->nullable();
            $table->date('Tanggal_Selesai')->nullable();
            $table->string('Alamat')->nullable();
            $table->Integer('No_HP')->nullable();
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
        Schema::dropIfExists('permohonan_cuti');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('karyawan_id');
            $table->string('Nama_Karyawan')->nullable();
            $table->integer('jabatan_id')->unsigned()->nullable();
            $table->foreign('jabatan_id')->references('jabatan_id')->on('Jabatan')->onDelete('cascade');
            $table->integer('devisi_id')->unsigned()->nullable();
            $table->foreign('devisi_id')->references('devisi_id')->on('Devisi')->onDelete('cascade');
            $table->integer('pendidikan_id')->unsigned()->nullable();
            $table->foreign('pendidikan_id')->references('pendidikan_id')->on('Pendidikan')->onDelete('cascade');
            $table->string('Alamat_Karyawan')->nullable();
            $table->string('Tempat_Lahir')->nullable();
            $table->date('Tanggal_Lahir')->nullable();
            $table->string('Agama')->nullable();
            $table->string('Golongan_Darah')->nullable();
            $table->string('Status_Pernikahan')->nullable();
            $table->integer('Jumlah_Anak')->nullable();
            $table->string('No_Hp')->nullable();
            $table->date('Mulai_Kerja')->nullable();
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
        Schema::dropIfExists('karyawan');
    }
}

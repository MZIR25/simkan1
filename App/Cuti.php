<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = "permohonan_cuti";
    protected $primaryKey = "cuti_id";
    protected $fillable = [
       'cuti_id',
       'Nama_Karyawan',
       'Jabatan',
       'Alasan_Cuti',
       'Tanggal_Mulai',
       'Tanggal_Selesai',
       'Alamat',
       'No_HP'];
}

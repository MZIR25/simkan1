<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "karyawan_id";
    protected $fillable = [
       'karyawan_id',
       'Nama_Karyawan',
       'Alamat_Karyawan',
       'Tempat_Lahir',
       'Tanggal_Lahir',
       'Agama',
       'Golongan_Darah',
       'Status_Pernikahan',
       'Jumlah',
       'No_Hp',
       'Mulai_Kerja'];



    public function Jobdesk()
    {
        return $this->hasMany('App\Jobdesk');
    }
    public function Jabatan()
    {
        return $this->belongsTo('App\Jabatan','jabatan_id');
    }
}

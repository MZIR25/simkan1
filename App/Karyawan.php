<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "karyawan_id";
    protected $fillable = [
       'karyawan_id',
       'jabatan_id',
       'devisi_id',
       'pendidikan_id',
       'Nama_Karyawan',
       'Alamat_Karyawan',
       'Tempat_Lahir',
       'Tanggal_Lahir',
       'Agama',
       'Golongan_Darah',
       'Status_Pernikahan',
       'Jumlah_Anak',
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
    public function Pendidikan()
    {
        return $this->belongsTo('App\Pendidikan','pendidikan_id');
    }
    public function Devisi()
    {
        return $this->belongsTo('App\Devisi','devisi_id');
    }
    public function User()
    {
        return $this->hasOne('App\User');
    }
}

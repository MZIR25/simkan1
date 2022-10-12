<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = "pendidikan";
    protected $primaryKey = "pendidikan_id";
    protected $fillable = [
        'pendidikan_id',
        'Tingkat_Pendidikan',
        'Tahun_Lulus',
        'Nama_Sekolah',
        'No_Ijazah'
    ];

    public function Karyawan()
    {
        return $this->hasOne('App\Karyawan', 'karyawan_id');
    }
}

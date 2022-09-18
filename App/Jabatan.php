<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = "jabatan";
    protected $primaryKey = "jabatan_id";
    protected $fillable = [
       'jabatan_id',
       'Jabatan',
       'Keterangan'];

       public function Karyawan()
       {
           return $this->hasOne('App\Karyawan','karyawan_id');
       }
}

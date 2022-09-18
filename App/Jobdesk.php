<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Jobdesk extends Model
{
    protected $table = "jobdesk";
    protected $primaryKey = "jobdesk_id";
    protected $fillable = [
       'jobdesk_id',
       'Jabatan',
       'Jam_Mulai',
       'Jam_Selesai',
       'Tugas_Karyawan'];


       public function Karyawan()
       {
           return $this->belongsTo('App\Karyawan','karyawan_id');
       }
}

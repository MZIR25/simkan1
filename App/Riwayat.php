<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



class Riwayat extends Model
{
    protected $table = "riwayat";

    protected $fillable = ['id','nama','level', 'aktivitas','created_at'];

    public function Karyawan()
    {
        return DB::table('karyawan')->get();
    }

    public function getCreatedAtAttribute()
    {

        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d, M Y H:i a');
    }
}

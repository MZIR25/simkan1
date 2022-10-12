<?php

namespace App\Exports;

use App\Gaji;
use Maatwebsite\Excel\Concerns\FromCollection;

class GajiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gaji::all();
    }
}

<?php

namespace App\Exports;

use App\Jobdesk;
use Maatwebsite\Excel\Concerns\FromCollection;

class JobdeskExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jobdesk::all();
    }
}

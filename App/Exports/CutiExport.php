<?php

namespace App\Exports;

use App\Cuti;
use League\CommonMark\Block\Element\Heading;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\ErrorHandler\Collecting;


class CutiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cuti::all();
    }
    public function headings(): array
    {
        return [
            'cuti_id',
            'karyawan_id',
            'Alasan_Cuti',
            'Tanggal_Mulai',
            'Tanggal_Selesai'
        ];
    }
}

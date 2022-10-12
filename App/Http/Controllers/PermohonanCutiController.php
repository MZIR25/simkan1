<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Karyawan;
use App\Exports\CutiExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class PermohonanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('Cuti.v_permohonan_cuti', compact('cuti'));
    }

    public function export_excel()
    {
        return Excel::download(new CutiExport, 'Daftar Cuti.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=Karyawan::get();
        return view('Cuti.v_unggah_cuti', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Alasan_Cuti'=> 'required',
            'Tanggal_Mulai'=> 'required',
            'Tanggal_Selesai'=> 'required',


        ]);

        $cuti=new Cuti;

        $cuti->karyawan_id=$request->get('karyawan_id');
        $cuti->Alasan_Cuti=$request->get('Alasan_Cuti');
        $cuti->Tanggal_Mulai=$request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai=$request->get('Tanggal_Selesai');
        $cuti->save();

        return redirect('permohonan_cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function show($permohonanCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function edit($cuti_id)
    {
        $karyawan=Karyawan::all();
        $cuti = Cuti::find($cuti_id);
        return view('Cuti.v_edit_cuti', compact('cuti','karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cuti_id)
    {
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Alasan_Cuti'=> 'required',
            'Tanggal_Mulai'=> 'required',
            'Tanggal_Selesai'=> 'required',


        ]);

        $cuti = Cuti::find($cuti_id);

        $cuti->karyawan_id=$request->get('karyawan_id');
        $cuti->Alasan_Cuti=$request->get('Alasan_Cuti');
        $cuti->Tanggal_Mulai=$request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai=$request->get('Tanggal_Selesai');


        $cuti->save();

        return redirect('permohonan_cuti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy($cuti)
    {
        $cuti = Cuti::find($cuti);
        $cuti->delete();
        return redirect('permohonan_cuti');
    }
}

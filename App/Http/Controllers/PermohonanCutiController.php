<?php

namespace App\Http\Controllers;

use App\Cuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cuti.v_unggah_cuti');
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
            'Nama_Karyawan'=> 'required',
            'Jabatan'=> 'required',
            'Alasan_Cuti'=> 'required',
            'Tanggal_Mulai'=> 'required',
            'Tanggal_Selesai'=> 'required',
            'Alamat'=> 'required',
            'No_HP'=> 'required'
        ]);

        $cuti=new Cuti;

        $cuti->Nama_Karyawan=$request->get('Nama_Karyawan');
        $cuti->Jabatan=$request->get('Jabatan');
        $cuti->Alasan_Cuti=$request->get('Alasan_Cuti');
        $cuti->Tanggal_Mulai=$request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai=$request->get('Tanggal_Selesai');
        $cuti->Alamat=$request->get('Alamat');
        $cuti->No_HP=$request->get('No_HP');
        $cuti->save();

        return redirect('permohonan_cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function show(PermohonanCuti $permohonanCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuti = Cuti::find($id);
        return view('Cuti.v_edit_cuti', compact('cuti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermohonanCuti  $permohonanCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nama_Karyawan'=> 'required',
            'Jabatan'=> 'required',
            'Alasan_Cuti'=> 'required',
            'Tanggal_Mulai'=> 'required',
            'Tanggal_Selesai'=> 'required',
            'Alamat'=> 'required',
            'No_HP'=> 'required'
        ]);

        $cuti = Cuti::find($id);

        $cuti->Nama_Karyawan=$request->get('Nama_Karyawan');
        $cuti->Jabatan=$request->get('Jabatan');
        $cuti->Alasan_Cuti=$request->get('Alasan_Cuti');
        $cuti->Tanggal_Mulai=$request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai=$request->get('Tanggal_Selesai');
        $cuti->Alamat=$request->get('Alamat');
        $cuti->No_HP=$request->get('No_HP');
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

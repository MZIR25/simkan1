<?php

namespace App\Http\Controllers;

use App\Gaji;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DaftarGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();
        return view('Gaji.v_daftar_gaji', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Gaji.v_unggah_gaji');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nama_Karyawan'=> 'required',
            'Jabatan'=> 'required',
            'Gaji_Pokok'=> 'required',
            'Status_Menikah'=> 'required',
            'Pajak_Bpjs'=> 'required',
            'Jumlah_Gaji'=> 'required'
        ]);
        $gaji=new Gaji;

        $gaji->Nama_Karyawan=$request->get('Nama_Karyawan');
        $gaji->Jabatan=$request->get('Jabatan');
        $gaji->Gaji_Pokok=$request->get('Gaji_Pokok');
        $gaji->Status_Menikah=$request->get('Status_Menikah');
        $gaji->Pajak_Bpjs=$request->get('Pajak_Bpjs');
        $gaji->Jumlah_Gaji=$request->get('Jumlah_Gaji');
        $gaji->save();

        return redirect('daftar_gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gaji::find($id);
        return view('Gaji.v_edit_gaji', compact('gaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nama_Karyawan'=> 'required',
            'Jabatan'=> 'required',
            'Gaji_Pokok'=> 'required',
            'Status_Menikah'=> 'required',
            'Pajak_Bpjs'=> 'required',
            'Jumlah_Gaji'=> 'required'
        ]);
        $gaji= Gaji::find($id);

        $gaji->Nama_Karyawan=$request->get('Nama_Karyawan');
        $gaji->Jabatan=$request->get('Jabatan');
        $gaji->Gaji_Pokok=$request->get('Gaji_Pokok');
        $gaji->Status_Menikah=$request->get('Status_Menikah');
        $gaji->Pajak_Bpjs=$request->get('Pajak_Bpjs');
        $gaji->Jumlah_Gaji=$request->get('Jumlah_Gaji');
        $gaji->save();

        return redirect('daftar_gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gaji)
    {
        $gaji = Gaji::find($gaji);
        $gaji->delete();
        return redirect('daftar_gaji');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\GajiExport;
use App\Gaji;
use App\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Riwayat;
use Illuminate\Support\Facades\Auth;

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
    public function export_excel()
    {
        return Excel::download(new GajiExport, 'Daftar Gaji.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=Karyawan::get();

        return view('Gaji.v_unggah_gaji', compact('karyawan'));
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
            'karyawan_id'=> 'required',
            'Gaji_Pokok'=> 'required',
            'Pajak_Bpjs'=> 'required',
            'Jumlah_Gaji'=> 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menambah Data Gaji Karyawan  '.$request->name.''
        ]);
        $gaji=new Gaji;

        $gaji->karyawan_id=$request->get('karyawan_id');
        $gaji->Gaji_Pokok=$request->get('Gaji_Pokok');
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
    public function show($gaji_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gaji_id)
    {
        $karyawan=Karyawan::all();
        $gaji = Gaji::find($gaji_id);
        return view('Gaji.v_edit_gaji', compact('gaji','karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gaji_id)
    {
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Gaji_Pokok'=> 'required',

            'Pajak_Bpjs'=> 'required',
            'Jumlah_Gaji'=> 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Data Gaji Karyawan  '.$request->name.''
        ]);
        $gaji= Gaji::find($gaji_id);

        $gaji->karyawan_id=$request->get('karyawan_id');
        $gaji->Gaji_Pokok=$request->get('Gaji_Pokok');
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
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menambah Data Karyawan  '.$gaji->name.''
        ]);
        return redirect('daftar_gaji');
    }
}

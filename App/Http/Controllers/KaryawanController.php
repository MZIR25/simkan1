<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Jabatan;
use App\Devisi;
use App\Exports\KaryawanExport;
use App\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::with(['Pendidikan'])->get();
        return view('Karyawan.v_daftar_karyawan', compact('karyawan'));

    }
    public function export_excel()
    {
        return Excel::download(new KaryawanExport, 'Daftar Karyawan.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=Jabatan::all();
        $pendidikan=Pendidikan::all();
        $devisi=Devisi::all();
        return view('Karyawan.v_unggah_daftar_karyawan', compact(['jabatan','pendidikan','devisi']));
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
            'jabatan_id'=> 'required',
            'devisi_id'=> 'required',
            'Nama_Karyawan'=> 'required',
            'Alamat_Karyawan'=> 'required',
            'Tempat_Lahir'=> 'required',
            'Tanggal_Lahir'=> 'required',
            'Agama'=> 'required',
            'Golongan_Darah'=> 'required',
            'Status_Pernikahan'=> 'required',
            'Jumlah_Anak'=> 'required',
            'No_Hp'=> 'required',
            'Mulai_Kerja'=> 'required'
        ]);
        DB::transaction(function()use ($request) {
            $pendidikan = Pendidikan::create([
                'Tingkat_Pendidikan'=> $request->Tingkat_Pendidikan,
                'Tahun_Lulus'=> $request->Tahun_Lulus,
                'Nama_Sekolah'=> $request->Nama_Sekolah,
                'No_Ijazah'=> $request->No_Ijazah
            ]);
            $karyawan=Karyawan::create([
                'jabatan_id'=> $request->jabatan_id,
                'devisi_id'=> $request->devisi_id,
                'pendidikan_id'=> $pendidikan->pendidikan_id,
                'Nama_Karyawan'=> $request->Nama_Karyawan,
                'Alamat_Karyawan'=> $request->Alamat_Karyawan,
                'Tempat_Lahir'=> $request->Tempat_Lahir,
                'Tanggal_Lahir'=> $request->Tanggal_Lahir,
                'Agama'=> $request->Agama,
                'Golongan_Darah'=> $request->Golongan_Darah,
                'Status_Pernikahan'=> $request->Status_Pernikahan,
                'Jumlah_Anak'=> $request->Jumlah_Anak,
                'No_Hp'=> $request->No_Hp,
                'Mulai_Kerja'=> $request->Mulai_Kerja
            ]);

        });



        return redirect('daftar_karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan_id)
    {
        $jabatan=Jabatan::all();
        $pendidikan=Pendidikan::all();
        $devisi=Devisi::all();
        $karyawan=Karyawan::with(['Pendidikan'])->get()->find($karyawan_id)->first();
        // dd($karyawan);
        return view('Karyawan.v_edit_daftar_karyawan', compact(['jabatan','pendidikan','devisi','karyawan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan_id)
    {
        $karyawan=Karyawan::with('Pendidikan')->get()->find($karyawan_id);
        $this->validate($request, [
            'jabatan_id'=> 'required',
            'devisi_id'=> 'required',
            'Nama_Karyawan'=> 'required',
            'Alamat_Karyawan'=> 'required',
            'Tempat_Lahir'=> 'required',
            'Tanggal_Lahir'=> 'required',
            'Agama'=> 'required',
            'Golongan_Darah'=> 'required',
            'Status_Pernikahan'=> 'required',
            'Jumlah_Anak'=> 'required',
            'No_Hp'=> 'required',
            'Mulai_Kerja'=> 'required'
        ]);

        DB::transaction(function () use($request, $karyawan){
            $pendidikan = Pendidikan::find($karyawan->pendidikan_id);
            $pendidikan->update([
                'Tingkat_Pendidikan'=> $request->Tingkat_Pendidikan,
                'Tahun_Lulus'=> $request->Tahun_Lulus,
                'Nama_Sekolah'=> $request->Nama_Sekolah,
                'No_Ijazah'=> $request->No_Ijazah
            ]);

            $karyawan->update([
                'jabatan_id'=> $request->jabatan_id,
                'devisi_id'=> $request->devisi_id,
                'Nama_Karyawan'=> $request->Nama_Karyawan,
                'Alamat_Karyawan'=> $request->Alamat_Karyawan,
                'Tempat_Lahir'=> $request->Tempat_Lahir,
                'Tanggal_Lahir'=> $request->Tanggal_Lahir,
                'Agama'=> $request->Agama,
                'Golongan_Darah'=> $request->Golongan_Darah,
                'Status_Pernikahan'=> $request->Status_Pernikahan,
                'Jumlah_Anak'=> $request->Jumlah_Anak,
                'No_Hp'=> $request->No_Hp,
                'Mulai_Kerja'=> $request->Mulai_Kerja
            ]);
        });

        return redirect('daftar_karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan_id)
    {
        $karyawan = Karyawan::with('Pendidikan')->get()->find($karyawan_id);
        $karyawan->delete();
        return redirect('daftar_karyawan');
    }
}

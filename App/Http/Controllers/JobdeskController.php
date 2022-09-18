<?php

namespace App\Http\Controllers;

use App\Jobdesk;
use App\Karyawan;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JobdeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobdesk = Jobdesk::all();
        return view('Jobdesk.v_daftar_jobdesk', compact('jobdesk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=Karyawan::get();
        $jabatan=Jabatan::get();
        return view('Jobdesk.v_unggah_jobdesk', compact('karyawan'));
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
            'Jam_Mulai'=> 'required',
            'Jam_Selesai'=> 'required',
            'Tugas_Karyawan'=> 'required',
        ]);
        $jobdesk=new Jobdesk;

        $jobdesk->karyawan_id=$request->get('karyawan_id');

        $jobdesk->Jam_Mulai=$request->get('Jam_Mulai');
        $jobdesk->Jam_Selesai=$request->get('Jam_Selesai');
        $jobdesk->Tugas_Karyawan=$request->get('Tugas_Karyawan');
        $jobdesk->save();

        return redirect('daftar_jobdesk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobdesk = Jobdesk::find($id);
        return view('Jobdesk.v_edit_jobdesk', compact('jobdesk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nama_Karyawan'=> 'required',
            'Jabatan'=> 'required',
            'Jam_Mulai'=> 'required',
            'Jam_Selesai'=> 'required',
            'Tugas_Karyawan'=> 'required',
        ]);
        $jobdesk= Jobdesk::find($id);

        $jobdesk->Nama_Karyawan=$request->get('Nama_Karyawan');
        $jobdesk->Jabatan=$request->get('Jabatan');
        $jobdesk->Jam_Mulai=$request->get('Jam_Mulai');
        $jobdesk->Jam_Selesai=$request->get('Jam_Selesai');
        $jobdesk->Tugas_Karyawan=$request->get('Tugas_Karyawan');
        $jobdesk->save();

        return redirect('daftar_jobdesk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function destroy($jobdesk)
    {
        $jobdesk = Jobdesk::find($jobdesk);
        $jobdesk->delete();
        return redirect('daftar_jobdesk');
    }
}

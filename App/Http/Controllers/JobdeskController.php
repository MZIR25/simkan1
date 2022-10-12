<?php

namespace App\Http\Controllers;

use App\Exports\JobdeskExport;
use App\Jobdesk;
use App\Karyawan;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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
    public function export_excel()
    {
        return Excel::download(new JobdeskExport, 'Daftar Jobdesk.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=Karyawan::get();
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
            'Tugas_Karyawan'=> 'required'
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
    public function show($jobdesk_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function edit($jobdesk_id)
    {
        $karyawan=Karyawan::all();
        $jobdesk = Jobdesk::find($jobdesk_id);
        // dd($jobdesk);
        return view('Jobdesk.v_edit_jobdesk', compact('jobdesk','karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jobdesk_id)
    {
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Jam_Mulai'=> 'required',
            'Jam_Selesai'=> 'required',
            'Tugas_Karyawan'=> 'required',
        ]);
        $jobdesk= Jobdesk::find($jobdesk_id);

        $jobdesk->karyawan_id=$request->get('karyawan_id');
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

<?php

namespace App\Http\Controllers;


use App\User;
use App\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('User.v_manajemen_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan=Karyawan::all();
        $users = User::find($id);
        // dd($users);
        return view('User.v_edit_user', compact('users','karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',

        ]);

        $users=User::find($id);

        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->level=$request->get('level');


        $users->save();
        return redirect('manajemen_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($users)
    {
        $users = User::find($users);
        $users->delete();
        return redirect('manajemen_user');
    }
}

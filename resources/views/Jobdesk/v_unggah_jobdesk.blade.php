@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM UNGGAH JOBDESK</b></h4>
            </div>
            <div class="card-body">

<!-- membuat formnya -->
<!-- bagian Nama -->
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <form action="/simpan_jobdesk" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <select id="karyawan_id" name="karyawan_id" class="form-control">
                            @foreach ($karyawan as $k)
                                <option value="{{$k->karyawan_id}}">{{$k->Nama_Karyawan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-validate-error-message name="karyawan_id"/>
                </div>

                            
                  
<!-- bagian Jabatan -->
                {{-- <div class="form-group row">
                    <label for="Nama_Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        @foreach ($karyawan as $k)
                            <input type="text" name="Nama_Jabatan" readonly class="form-control" id="Nama_Jabatan" value={{$k->Jabatan->Nama_Jabatan}}>
                        @endforeach
                    </div>
                    <x-validate-error-message name="Jabatan"/>
                </div> --}}

<!-- bagian Jam_Mulai -->
                <div class="form-group row">
                    <label for="Jam_Mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                        <div class="col-md-2">
                            <input type="time" id="Jam_Mulai" name="Jam_Mulai" class="form-control" />
                            <x-validate-error-message name="Jam_Mulai"/>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="Jam_Selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-md-2">
                            <input type="time" id="Jam_Selesai" name="Jam_Selesai" class="form-control"/>
                            <x-validate-error-message name="Jam_Selesai"/>
                        </div>
                </div>
<!-- bagian Tugas_Karyawan --> 
                <div class="form-group row">
                    <label for="Tugas_Karyawan" class="col-sm-2 col-form-label">Tugas Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" id="Tugas_Karyawan" name="Tugas_Karyawan" class="form-control" placeholder="Masukkan Tugas Karyawan">
                            <x-validate-error-message name="Tugas_Karyawan"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                    <div>
                </div>
            </form>
            </div>
        </div>
    </div>
  </div>

@endsection
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
            <form action="{{ url('update_jobdesk', $jobdesk->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                {{-- <div class="form-group">
                    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div> --}}
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                         <input type="text" value="{{$jobdesk->Nama_Karyawan}}" id="Nama_Karyawan" name="Nama_Karyawan" class="form-control" placeholder="Masukkan Nama">
                            <x-validate-error-message name="Nama_Karyawan"/>
                    </div>
                </div>
<!-- bagian Jabatan -->
                <div class="form-group row">
                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$jobdesk->Jabatan}}" id="Jabatan" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan">
                            <x-validate-error-message name="Jabatan"/>
                    </div>
                </div>
<!-- bagian Jam_Mulai -->
                <div class="form-group row">
                    <label for="Jam_Mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                        <div class="col-sm-10">
                            <input type="time" value="{{$jobdesk->Jam_Mulai}}" id="Jam_Mulai" name="Tanggal_Mulai" class="form-control"/>
                            <x-validate-error-message name="Jam_Mulai"/>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="Jam_Selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-sm-10">
                            <input type="time" value="{{$jobdesk->Jam_Selesai}}" id="Jam_Selesai" name="Jam_Selesai" class="form-control"/>
                            <x-validate-error-message name="Jam_Selesai"/>
                        </div>
                </div>
<!-- bagian Tugas_Karyawan --> 
                <div class="form-group row">
                    <label for="Tugas_Karyawan" class="col-sm-2 col-form-label">Tugas_Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$jobdesk->Tugas_Karyawan}}" id="Tugas_Karyawan" name="Tugas_Karyawan" class="form-control" placeholder="Masukkan Tugas Karyawan">
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
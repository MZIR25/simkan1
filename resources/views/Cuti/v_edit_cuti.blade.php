@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM UNGGAH PERMOHONAN CUTI</b></h4>
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
            <form action="{{ url('update_cuti', $cuti->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                         <input type="text" value="{{$cuti->Nama_Karyawan}}" id="Nama_Karyawan" name="Nama_Karyawan" class="form-control" placeholder="Masukkan Nama">
                            <x-validate-error-message name="Nama_Karyawan"/>
                    </div>
                </div>
<!-- bagian Jabatan -->
                <div class="form-group row">
                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->Jabatan}}" id="Jabatan" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan">
                            <x-validate-error-message name="Jabatan"/>
                    </div>
                </div>
<!-- bagian Alasan Cuti -->
                <div class="form-group row">
                    <label for="Alasan_Cuti" class="col-sm-2 col-form-label">Alasan Cuti</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->Alasan_Cuti}}" id="Alasan_Cuti" name="Alasan_Cuti" class="form-control" placeholder="Alasan Cuti">
                            <x-validate-error-message name="Alasan_Cuti"/>
                    </div>
                </div>
                            

<!-- bagian tanggal -->
                <div class="form-group row">
                    <label for="Tanggal_Mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" value="{{$cuti->Tanggal_Mulai}}" id="Tanggal_Mulai" name="Tanggal_Mulai" class="form-control"/>
                            <x-validate-error-message name="Tanggal_Mulai"/>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="Tanggal_Selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" value="{{$cuti->Tanggal_Selesai}}" id="Tanggal_Selesai" name="Tanggal_Selesai" class="form-control"/>
                            <x-validate-error-message name="Tanggal_Selesai"/>
                        </div>
                </div>
<!-- bagian Alamat --> 
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->Alamat}}" id="Alamat" name="Alamat" class="form-control" placeholder="Masukkan Alamat">
                            <x-validate-error-message name="Alamat"/>
                    </div>
                </div>
<!-- bagian Alamat -->  
                <div class="form-group row">
                    <label for="No_HP" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->No_HP}}" id="No_HP" name="No_HP" class="form-control" placeholder="Masukkan Nomor HP">
                            <x-validate-error-message name="No_HP"/>
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
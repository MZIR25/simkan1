@extends('layouts.index')

@section('content')
<div class="col-md-12 p-5 pt-2">
    <h3><i class="fas fa-swatchbook"></i></i> DAFTAR GAJI</h3><hr>
        <a href="{{ route('unggah_gaji') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Gaji</a>
        <table id="myTable" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Gaji Pokok</th>
              <th scope="col">Status Menikah</th>
              <th scope="col">Pajak Bpjs</th>
              <th scope="col">Jumlah Gaji</th>
              <th colspan="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              @foreach ($gaji as $g )
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->Nama_Karyawan }}</td>
                <td>{{ $g->Jabatan }}</td>
                <td>{{ $g->Gaji_Pokok }}</td>
                <td>{{ $g->Status_Menikah }}</td>
                <td>{{ $g->Pajak_Bpjs }}</td>
                <td>{{ $g->Jumlah_Gaji }}</td>
                <td>
                  <div class="row">
                    <div class="col-md-2">
                      <i class="fas fa-edit bg-secondary p-2 text-white rounded" data-toggle="tooltip" title="Edit">
                      <a href="/edit_gaji/{{$g->id}}"></i></a>
                    </div>
                    
                    <div class="col-md-2 offset-md-4">
                    <form action="{{ url('delete_gaji', $g->id) }} " method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                    <button class="border-0 shadow-none p-0" type="submit">
                        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Hapus"></i>
                    </button>
                    </form>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
</div>
    
@endsection
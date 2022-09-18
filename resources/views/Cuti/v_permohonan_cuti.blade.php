@extends('layouts.index')

@section('content')
<div class="col-md-12 p-5 pt-2">
    <h3><i class="fas fa-swatchbook"></i></i> DAFTAR CUTI</h3><hr>
        <a href="{{ route('unggah_cuti') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Permohonan</a>
        <table id="myTable" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Alasan Cuti</th>
              <th scope="col">Tangggal Mulai Cuti</th>
              <th scope="col">Tangggal Selesai Cuti</th>
              <th scope="col">Alamat</th>
              <th scope="col">Nomor HP</th>
              <th colspan="col">Aksi</th>
            </tr>
           
        </thead>
        <tbody>
            <tr>
              @foreach ($cuti as $c )
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->Nama_Karyawan }}</td>
                <td>{{ $c->Jabatan }}</td>
                <td>{{ $c->Alasan_Cuti }}</td>
                <td>{{ $c->Tanggal_Mulai }}</td>
                <td>{{ $c->Tanggal_Selesai }}</td>
                <td>{{ $c->Alamat }}</td>
                <td>{{ $c->No_HP }}</td>

                <td>
                  <div class="row">
                    <div class="col-md-2">
                      <i class="fas fa-edit bg-secondary p-2 text-white rounded" data-toggle="tooltip" title="Edit">
                      <a href="/edit_cuti/{{$c->id}}"></i></a>
                    </div>
                    
                    <div class="col-md-2 offset-md-4">
                    <form action="{{ url('delete_cuti', $c->id) }} " method="POST">
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
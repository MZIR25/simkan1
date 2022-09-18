@extends('layouts.index')

@section('content')
<div class="col-md-12 p-5 pt-2">
    <h3><i class="fas fa-swatchbook"></i></i> DAFTAR JOBDESK</h3><hr>
        <a href="{{ route('unggah_jobdesk') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Jobdesk</a>
        <table id="myTable" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Jam Mulai</th>
              <th scope="col">Jam Selesai</th>
              <th scope="col">Tugas Karyawan</th>
              <th colspan="col">Aksi</th>
            </tr>
           
        </thead>
        <tbody>
            <tr>
              @foreach ($jobdesk as $j )
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->Karyawan->Nama_Karyawan }}</td>
                <td>{{ $j->Karyawan->jabatan_id->Nama_Jabatan }}</td>
                <td>{{ $j->Jam_Mulai }}</td>
                <td>{{ $j->Jam_Selesai }}</td>
                <td>{{ $j->Tugas_Karyawan }}</td>
                <td>
                  <div class="row">
                    <div class="col-md-2">
                      <i class="fas fa-edit bg-secondary p-2 text-white rounded" data-toggle="tooltip" title="Edit">
                      <a href="/edit_jobdesk/{{$j->id}}"></i></a>
                    </div>
                    
                    <div class="col-md-2 offset-md-4">
                    <form action="{{ url('delete_jobdesk', $j->id) }} " method="POST">
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
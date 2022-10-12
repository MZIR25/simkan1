@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR CUTI</h3><hr>
                    <a href="{{ route('unggah_cuti') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Permohonan</a>
                    <a href="permohonan_cuti/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a>
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
                        @foreach ($cuti as $c )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->Karyawan->Nama_Karyawan }}</td>
                            <td>{{ $c->Karyawan->Jabatan->Nama_Jabatan }}</td>
                            <td>{{ $c->Alasan_Cuti }}</td>
                            <td>{{ $c->Tanggal_Mulai }}</td>
                            <td>{{ $c->Tanggal_Selesai }}</td>
                            <td>{{ $c->Karyawan->Alamat_Karyawan }}</td>
                            <td>{{ $c->Karyawan->No_Hp }}</td>

                            <td>
                                <div>
                                    <a href="/edit_cuti/{{$c->cuti_id}}"><i class="d-inline fas fa-edit bg-warning p-2 text-white rounded " data-toggle="tooltip" title="Edit"></a></i>
                                    <form class="d-inline " action="{{ url('delete_cuti', $c->cuti_id) }} " method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="border-0 shadow-none p-0 d-inline" type="submit">
                                            <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Hapus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

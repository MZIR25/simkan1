@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR GAJI</h3><hr>
                    <a href="{{ route('unggah_gaji') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Gaji</a>
                    <a href="daftar_gaji/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a>
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
                            <td>{{ $g->Karyawan->Nama_Karyawan }}</td>
                            <td>{{ $g->Karyawan->Jabatan->Nama_Jabatan }}</td>
                            <td>{{ $g->Gaji_Pokok }}</td>
                            <td>{{ $g->Status_Menikah }}</td>
                            <td>{{ $g->Pajak_Bpjs }}</td>
                            <td>{{ $g->Jumlah_Gaji }}</td>
                            <td>
                            <div>
                                <a href="/edit_gaji/{{$g->gaji_id}}"><i class="d-inline fas fa-edit bg-warning p-2 text-white rounded " data-toggle="tooltip" title="Edit"></a></i>
                                <form class="d-inline " action="{{ url('delete_gaji', $g->gaji_id) }} " method="POST">
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

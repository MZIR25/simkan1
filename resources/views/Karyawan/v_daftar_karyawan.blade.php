@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR KARYAWAN</h3><hr>
                    <a href="{{ route('unggah_daftar_karyawan') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Data Karyawan</a>
                    <a href="daftar_karyawan/export_excel" class="btn btn-success mb-3"><i class="fas fa fa-file-excel mr-2"></i>EXPORT EXCEL</a>
                    <table id="myTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Tingkat Pendidikan</th>
                        <th scope="col">Devisi</th>
                        <th scope="col">Alamat Karyawan</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Golongan Darah</th>
                        <th scope="col">Mulai Kerja</th>
                        <th scope="col">Status Pernikahan</th>
                        <th scope="col">Jumlah Anak</th>
                        <th scope="col">Nomor HP</th>
                        <th colspan="col">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                        @foreach ($karyawan as $k )
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->Nama_Karyawan }}</td>
                            <td>{{ $k->Jabatan->Nama_Jabatan }}</td>
                            <td>{{ $k->Pendidikan->Tingkat_Pendidikan }}</td>
                            <td>{{ $k->Devisi->Nama_Devisi }}</td>
                            <td>{{ $k->Alamat_Karyawan }}</td>
                            <td>{{ $k->Tempat_Lahir }}</td>
                            <td>{{ $k->Tanggal_Lahir }}</td>
                            <td>{{ $k->Agama }}</td>
                            <td>{{ $k->Golongan_Darah }}</td>
                            <td>{{ $k->Mulai_Kerja }}</td>
                            <td>{{ $k->Status_Pernikahan }}</td>
                            <td>{{ $k->Jumlah_Anak }}</td>
                            <td>{{ $k->No_Hp }}</td>
                            <td>
                                <div>
                                    <a href="/edit_karyawan/{{$k->karyawan_id}}"><i class="fas fa-edit bg-warning p-2 text-white rounded d-inline" data-toggle="tooltip" title="Edit"></a></i>
                                    <form class="d-inline " action="{{ url('delete_karyawan', $k->karyawan_id) }} " method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="border-0 p-0 d-inline" type="submit">
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

@extends('layouts.admin')
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Data Kepala Keluarga') }}</h1>
    <button class="btn btn-sm btn-primary my-2" onclick="tambahRt()">Tambah KK</button>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($KK->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    Nama Lengkap
                                </th>
                                <th>
                                    No NIK
                                </th>
                                <th>
                                    No KK
                                </th>
                                <th>
                                    No RT
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Gol-darah
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Agama
                                </th>
                                <th>
                                    Status Perkawinan
                                </th>
                                <th>
                                    Pekerjaan
                                </th>
                                <th>
                                    Kewarganegaraan
                                </th>
                                <th>
                                    Aksi Data
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($KK as $kkeluarga)
                            <tr>
                                <td>
                                    {{$kkeluarga->nama_lengkap}}
                                </td>
                                <td>
                                    {{$kkeluarga->no_nik}}
                                </td>
                                <td>
                                    {{$kkeluarga->no_kk}}
                                </td>
                                <td>
                                    {{App\RT::where('id',$kkeluarga->rt_id)->first()->no_rt}}
                                </td>
                                <td>
                                    {{$kkeluarga->ttl}}
                                </td>
                                <td>
                                    {{$kkeluarga->jenis_kelamin}}
                                </td>
                                <td>
                                    {{$kkeluarga->golongan_darah}}
                                </td>
                                <td>
                                    {{$kkeluarga->alamat}}
                                </td>
                                <td>
                                    {{$kkeluarga->agama}}
                                </td>
                                <td>
                                    {{$kkeluarga->status_perkawinan}}
                                </td>
                                <td>
                                    {{$kkeluarga->pekerjaan}}
                                </td>
                                <td>
                                    {{$kkeluarga->kewarganegaraan}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" data-id="{{$datart->id}}" onclick="editDataKk(this)">Edit</button>

                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('hapus/kk/'.$datart->id)}}">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            @endForeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-info">
                    <h4 class="alert-heading">Informasi</h4>
                    <hr>
                    <p>Data Kepala Keluarga belum di tambahkan, Silahkan klik tombol <strong>Tambah KK</strong> untuk menambahkan!</p>
                </div>
                @endIf
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @include('modal.admin-modal')
    @include('modal.edit-modal')
@endsection

@section('main-content')
@extends('layouts.admin')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Data RT') }}</h1>
    <button class="btn btn-sm btn-primary my-2" onclick="tambahRt()">Tambah RT</button>

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
                @if($RT->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No RT</th>
                                <th>No NIK</th>
                                <th>No KK</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Gol. Darah</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($RT as $datart)
                            <tr>
                                <td>
                                    {{$datart->nama_lengkap}}
                                </td>
                                <td>
                                    {{$datart->no_rt}}
                                </td>
                                <td>
                                    {{$datart->no_nik}}
                                </td>
                                <td>
                                    {{$datart->no_kk}}
                                </td>
                                <td>
                                    {{$datart->ttl}}
                                </td>
                                <td>
                                    {{$datart->jenis_kelamin}}
                                </td>
                                <td>
                                    {{$datart->golongan_darah}}
                                </td>
                                <td>
                                    {{$datart->alamat}}
                                </td>
                                <td>
                                    {{$datart->agama}}
                                </td>
                                <td>
                                    {{$datart->status_perkawinan}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" data-id="{{$datart->id}}" onclick="editDataRt(this)">Edit</button>

                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('hapus/rt/'.$datart->id)}}">Hapus</button>
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
                    <p>Data RT belum di tambahkan, Silahkan klik tombol <strong>Tambah RT</strong> untuk menambahkan!</p>
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
@endsection

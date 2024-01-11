@extends('layouts.admin')

@section('main-content')
@include('modal.tamu-modal')


@if (session('success'))
<div id="success-alert" class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div id="error-alert" class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Laporan Tamu') }}</h1>
        @if(auth()->user() && auth()->user()->role == 'admin')
        <button class="btn btn-sm btn-primary my-2" onclick="tambahTamu()">Tambah Tamu</button>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($tamu->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="RTTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>Nama Lengkap</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                <th>Nomer Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tamu as $datatamu)
                                <tr>
                                    <td>
                                        {{$datatamu->nama_lengkap}}
                                    </td>
                                    <td>
                                        {{$datatamu->tujuan}}
                                    </td>
                                    <td>
                                        {{ $datatamu->tanggal->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{$datatamu->nomer_telp}}
                                    </td>
                                    @if($datatamu->status =='Masuk')
                                    <td>
                                        <span style="color: #e53e3e; background-color: #fed7d7;"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                            {{ $datatamu->status }}
                                        </span>
                                    </td>
                                    @elseif ($datatamu->status =='Keluar')
                                    <td>
                                        <span style="color: #079202; background-color: #bcf3ba;"
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                            {{ $datatamu->status }}
                                        </span>
                                    </td>
                                    @endif
                                    <td>
                                        <div class="btn-group d-flex justify-content-center">
                                            
                                            <a href="{{ route('tamu.detail', ['id' => $datatamu->id]) }}" class="btn btn-sm btn-info">Detail</a>
                                            <!-- Add spacing here -->
                                            <span style="margin-right: 5px;"></span>
                                            <button class="btn btn-sm btn-primary" data-url="{{ url('/update-status-tamu/'.$datatamu->id) }}" data-id="{{ $datatamu->id }}" onclick="editStatusTamu(this)">Selesai</button>
                                            <!-- Add spacing here -->
                                            <span style="margin-right: 5px;"></span>
                                            <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('/hapus/tamu/'.$datatamu->id)}}">Hapus</button>
                                            
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
                    <p>Data Tamu belum di tambahkan, Silahkan klik tombol <strong>Tambah Tamu</strong> untuk menambahkan!</p>
                </div>
                @endIf
            </div>
        </div>
    </div>
    <script>
        // Auto-hide success alert after 5 seconds
        setTimeout(function() {
            $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    
        // Auto-hide error alert after 5 seconds
        setTimeout(function() {
            $("#error-alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    </script>
    @endsection
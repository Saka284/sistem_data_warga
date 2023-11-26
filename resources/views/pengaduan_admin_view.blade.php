@section('main-content')
@extends('layouts.admin')
@include('modal.modal_pengaduan')

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger border-left-danger" role="alert" id="error-alert">
        <ul class="pl-4 my-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <!-- Page Heading -->   
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Pengaduan') }}</h1>
        <a class="btn btn-sm btn-primary my-2" href="{{ route('buat_pengaduan') }}">Tambah Pengaduan</a>
        <!-- Page Heading -->

        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($pengaduan->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="KTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Aduan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $item)
                            <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->created_at->format('l, d F Y') }}</td>
                                    @if($item->status =='Belum di Proses')
                                    <td>
                                        <span style="color: #e53e3e; background-color: #fed7d7;"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    @elseif ($item->status =='Sedang di Proses')
                                    <td>
                                        <span style="color: #ed8936; background-color: #fbd38d;"
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    @else
                                    <td>
                                        <span style="color: #48bb78; background-color: #c6f6d5;"
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    @endif
                                <td>
                                    <div class="btn-group d-flex justify-content-center">
                                        <a class="btn btn-sm btn-info" href="{{ route('pengaduan_detail', ['id' => $item->id]) }}">Detail</a>
                                        <span style="margin-right: 5px;"></span>
                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{ url('hapus/pengaduan/'.$item->id) }}">Hapus</button>
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
                    <p>Tidak ada pengaduan, Silahkan klik tombol <strong>Tambah Pengaduan</strong> untuk menambahkan!</p>
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
    
        // Auto-hide error alert after 2 seconds
        setTimeout(function() {
            $("#error-alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    </script>
@endsection

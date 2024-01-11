@section('main-content')
@extends('layouts.admin')
@include('modal.hapusAkun_modal')

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
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Data Akun') }}</h1>
        <a class="btn btn-sm btn-primary my-2" href="{{ route('halaman_TambahAkun') }}">Tambah Akun</a>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($user->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="KKTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->role }}</td>
                                <td style="width: 120px;"> 
                                    <div class="btn-group d-flex justify-content-center">
                                        <a class="btn btn-sm btn-info" onclick="resetPassword(this)" data-url="{{ url('/reset-password/'.$item->id) }}" data-id="{{ $item->id }}">Reset</a>
                                        <span style="margin-right: 5px;"></span>
                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{ url('/hapus/akun/'.$item->id) }}">Hapus</button>
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
                    <p>Tidak ada Akun, Silahkan klik tombol <strong>Tambah Akun</strong> untuk menambahkan!</p>
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

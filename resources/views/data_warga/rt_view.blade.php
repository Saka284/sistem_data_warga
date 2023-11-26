@section('main-content')
@extends('layouts.admin')

@include('modal.admin-modal')
@include('modal.edit-modal')

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
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Data RT') }}</h1>
        @if(auth()->user() && auth()->user()->role == 'admin')
        <button class="btn btn-sm btn-primary my-2" onclick="tambahRt()">Tambah RT</button>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($RT->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="RTTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>Nama Lengkap</th>
                                <th>No RT</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
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
                                        {{$datart->ttl}}
                                    </td>
                                    <td>
                                        {{$datart->jenis_kelamin}}
                                    </td>
                                    <td>
                                        {{$datart->alamat}}
                                    </td>
                                    <td>
                                        <div class="btn-group d-flex justify-content-center">
                                            <button class="btn btn-sm btn-primary" data-id="{{$datart->id}}" onclick="editDataRt(this)">Edit</button>

                                            <!-- Add spacing here -->
                                            <span style="margin-right: 5px;"></span>
                                        
                                            <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('hapus/rt/'.$datart->id)}}">Hapus</button>
                                        
                                            <!-- Add spacing here -->
                                            <span style="margin-right: 5px;"></span>
                                        
                                            <a href="{{ route('rt.detail', ['id' => $datart->id]) }}" class="btn btn-sm btn-info">Detail</a>
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
        // Auto-hide success alert after 2 seconds
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

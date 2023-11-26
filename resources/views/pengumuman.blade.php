@section('main-content')
@extends('layouts.admin')

@include('modal.pengumuman-modal')
@include('modal.edit-pengumuman')

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
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('PENGUMUMAN') }}</h1>
        @if(auth()->user() && auth()->user()->role == 'admin')
        <button class="btn btn-sm btn-primary my-2" onclick="tambahPengumuman()">Tambah Pengumuman</button>
        @endif
        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($pengumumans->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="KTable">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengumumans as $pengumuman)
                            <tr>
                                    <td>{{ $pengumuman->judul_pengumuman }}</td>
                                    <td>{{ $pengumuman->isi_pengumuman }}</td>
                                    <td>{{ $pengumuman->tgl_pengumuman }}</td>
                                <td>
                                    <div class="btn-group d-flex justify-content-center">
                                        <button class="btn btn-sm btn-primary" data-id="{{$pengumuman->id}}" onclick="editPengumuman(this)">Edit</button>

                                        <span style="margin-right: 5px;"></span>
                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('hapus/pengumuman/'.$pengumuman->id)}}">Hapus</button>

                                        <span style="margin-right: 5px;"></span>
                                        
                                        <a href="{{ route('pengumuman.detail', ['id' => $pengumuman->id]) }}" class="btn btn-sm btn-info">Detail</a>
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
                    <p>Pengumuman belum di tambahkan, Silahkan klik tombol <strong>Tambah Pengumuman</strong> untuk menambahkan!</p>
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

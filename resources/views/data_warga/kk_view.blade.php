@section('main-content')
@extends('layouts.admin')
@include('modal.kk-modal')
@include('modal.edit-kk-modal')

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
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Data Kepala Keluarga') }}</h1>
        @if(auth()->user() && auth()->user()->role == 'admin')
        <button class="btn btn-sm btn-primary my-2" onclick="tambahKk()">Tambah KK</button>
        @endif
        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($KK->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="KKTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    Nama Lengkap
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
                                    Alamat
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
                                    <a href="{{ route('keluarga', ['id' => $kkeluarga->id]) }}">
                                        {{ $kkeluarga->nama_lengkap }}
                                    </a>
                                </td>
                                <td>
                                    {{App\Models\RT::where('id',$kkeluarga->rt_id)->first()->no_rt}}
                                </td>
                                <td>
                                    {{$kkeluarga->ttl}}
                                </td>
                                <td>
                                    {{$kkeluarga->jenis_kelamin}}
                                </td>
                               
                                <td>
                                    {{$kkeluarga->alamat}}
                                </td>
                                <td>
                                    <div class="btn-group d-flex justify-content-center">
                                        <button class="btn btn-sm btn-primary" data-id="{{$kkeluarga->id}}" onclick="editDataKk(this)">Edit</button>

                                        <span style="margin-right: 5px;"></span>
                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('hapus/kk/'.$kkeluarga->id)}}">Hapus</button>

                                        <span style="margin-right: 5px;"></span>                                        
                                        <a href="{{ route('kk.detail', ['id' => $kkeluarga->id]) }}" class="btn btn-sm btn-info">Detail</a>
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

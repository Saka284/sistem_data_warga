@section('main-content')
@extends('layouts.admin')
@include('modal.keluarga-modal')
@include('modal.edit-keluarga-modal')


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
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">Anggota Keluarga {{ $kepalaKeluarga->nama_lengkap }}</h1>
        @if(auth()->user() && auth()->user()->role == 'admin')
        <div class="d-flex justify-content-between align-items-center mb-2">
            <button class="btn btn-sm btn-primary" onclick="tambahKeluarga()">Tambah Anggota Keluarga</button>
            <a href="{{ route('kk') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
        @endif
        <!-- Page Heading -->

        <!-- DataTales Example -->
        
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($anggotaKeluarga->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="KTable">
                        <thead>
                            <tr>
                                <th>
                                    Nama Lengkap
                                </th>            
                                <th>
                                    Kepala Keluarga
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th> 
                                <th>
                                    Agama
                                </th>
                                <th>
                                    Status Perkawinan
                                </th>
                                <th>
                                    Aksi Data
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggotaKeluarga as $dataWarga)
                            <tr>
                                <td>
                                    {{$dataWarga->nama_lengkap}}
                                </td>
                                <td>
                                    {{App\Models\KK::where('id',$dataWarga->kepala_keluarga_id)->first()->nama_lengkap}}
                                </td>
                                <td>
                                    {{$dataWarga->ttl}}
                                </td>
                                <td>
                                    {{$dataWarga->jenis_kelamin}}
                                </td>
                                <td>
                                    {{$dataWarga->agama}}
                                </td>
                                <td>
                                    {{$dataWarga->status_perkawinan}}
                                </td>
                                <td>
                                    <div class="btn-group d-flex justify-content-center">
                                        <button class="btn btn-sm btn-primary" onclick="editDataKeluarga(this)" data-id="{{$dataWarga->id}}">Edit</button>
                                        <span style="margin-right: 5px;"></span>
                                        <button class="btn btn-sm btn-danger" onclick="hapusData(this)" data-url="{{url('hapus/k/'.$dataWarga->id)}}">Hapus</button>
                                        <span style="margin-right: 5px;"></span>                                        
                                        <a href="{{ route('k.detail', ['id' => $dataWarga->id]) }}" class="btn btn-sm btn-info">Detail</a>
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
                    <p>Data Anggota Keluarga belum di tambahkan, Silahkan klik tombol <strong>Tambah Anggota Keluarga</strong> untuk menambahkan!</p>
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

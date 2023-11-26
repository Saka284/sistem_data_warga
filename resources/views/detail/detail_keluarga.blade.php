@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Detail Anggota Keluarga') }}</h1>

    <!-- Display dataWarga details in a card -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nama Lengkap:</strong></p>
                    <p><strong>NIK:</strong></p>
                    <p><strong>Kepala Keluarga:</strong></p>
                    <p><strong>TTL:</strong></p>
                    <p><strong>Jenis Kelamin:</strong></p>
                    <p><strong>Golongan Darah:</strong></p>
                    <p><strong>Agama:</strong></p>
                    <p><strong>Status Perkawinan:</strong></p>
                    <p><strong>Pekerjaan:</strong></p>
                    <p><strong>Kewarganegaraan:</strong></p>
                    <!-- Add more details as needed -->
                </div>
                <div class="col-md-9">
                    <p>{{ $k->nama_lengkap }}</p>
                    <p>{{ $k->no_nik }}</p>
                    <p>{{App\Models\KK::where('id',$k->kepala_keluarga_id)->first()->nama_lengkap}}</p>
                    <p>{{ $k->ttl }}</p>
                    <p>{{ $k->jenis_kelamin }}</p>
                    <p>{{ $k->golongan_darah }}</p>
                    <p>{{ $k->agama }}</p>
                    <p>{{ $k->status_perkawinan }}</p>
                    <p>{{ $k->pekerjaan }}</p>
                    <p>{{ $k->kewarganegaraan }}</p>
                    <!-- Add more details as needed -->
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

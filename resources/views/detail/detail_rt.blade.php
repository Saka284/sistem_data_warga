@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Detail Ketua RT') }} {{ $rt->no_rt }}</h1>

    <!-- Display RT details in a card -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nama Lengkap:</strong></p>
                    <p><strong>No RT:</strong></p>
                    <p><strong>NIK:</strong></p>
                    <p><strong>No KK:</strong></p>
                    <p><strong>TTL:</strong></p>
                    <p><strong>Jenis Kelamin:</strong></p>
                    <p><strong>Golongan Darah:</strong></p>
                    <p><strong>Alamat:</strong></p>
                    <p><strong>Agama:</strong></p>
                    <p><strong>Status Perkawinan:</strong></p>
                    <!-- Add more details as needed -->
                </div>
                <div class="col-md-9">
                    <p>{{ $rt->nama_lengkap }}</p>
                    <p>{{ $rt->no_rt }}</p>
                    <p>{{ $rt->no_nik }}</p>
                    <p>{{ $rt->no_kk }}</p>
                    <p>{{ $rt->ttl }}</p>
                    <p>{{ $rt->jenis_kelamin }}</p>
                    <p>{{ $rt->golongan_darah }}</p>
                    <p>{{ $rt->alamat }}</p>
                    <p>{{ $rt->agama }}</p>
                    <p>{{ $rt->status_perkawinan }}</p>
                    <!-- Add more details as needed -->
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

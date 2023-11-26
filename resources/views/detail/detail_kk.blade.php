@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Detail Kepala Keluarga') }}</h1>

    <!-- Display KK details in a card -->
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
                    <p><strong>Pekerjaan:</strong></p>
                    <p><strong>Kewarganegaraan:</strong></p>
                    <!-- Add more details as needed -->
                </div>
                <div class="col-md-9">
                    <p>{{ $kk->nama_lengkap }}</p>
                    <p>{{App\Models\RT::where('id',$kk->rt_id)->first()->no_rt}}</p>
                    <p>{{ $kk->no_nik }}</p>
                    <p>{{ $kk->no_kk }}</p>
                    <p>{{ $kk->ttl }}</p>
                    <p>{{ $kk->jenis_kelamin }}</p>
                    <p>{{ $kk->golongan_darah }}</p>
                    <p>{{ $kk->alamat }}</p>
                    <p>{{ $kk->agama }}</p>
                    <p>{{ $kk->status_perkawinan }}</p>
                    <p>{{ $kk->pekerjaan }}</p>
                    <p>{{ $kk->kewarganegaraan }}</p>
                    <!-- Add more details as needed -->
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

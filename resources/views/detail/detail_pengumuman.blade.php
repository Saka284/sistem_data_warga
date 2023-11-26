@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Detail Pengumuman') }}</h1>

    <!-- Display KK details in a card -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <p><span style="color: blue; font-size: 200%; font-weight: bold;">{{ $pengumumans->judul_pengumuman }}</span></p>
                    <p>{{ $pengumumans->tgl_pengumuman }}</p>
                    <p><span style="color: black">{!! nl2br(e($pengumumans->isi_pengumuman)) !!}</span></p>
                    <!-- Add more details as needed -->
                </div>
                
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Detail Tamu') }}</h1>

    <!-- Display KK details in a card -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nama Lengkap:</strong></p>
                    <p><strong>Nomer Telepon:</strong></p>
                    <p><strong>Tanggal:</strong></p>
                    <p><strong>Tujuan:</strong></p>
                    <p><strong>Status:</strong></p>
                    <p><strong>Foto:</strong></p>
              
                </div>
                <div class="col-md-9">
                    <p>{{ $tamu->nama_lengkap }}</p>
                    <p>{{ $tamu->nomer_telp }}</p>
                    <p>{{ $tamu->tanggal->format('d-m-Y') }}</p>
                    <p>{{ $tamu->tujuan }}</p>
                    @if($tamu->status =='Masuk')
                                    <p>
                                        <span style="color: #e53e3e; background-color: #fed7d7;"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                            {{ $tamu->status }}
                                        </span>
                                    </p>
                                    @elseif ($tamu->status =='Keluar')
                                    <p>
                                        <span style="color: #079202; background-color: #bcf3ba;"
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                            {{ $tamu->status }}
                                        </span>
                                    </p>
                                    @endif
                    <img src="{{ asset('storage/' . $tamu->image) }}" alt="Tamu Image" style="max-width: 50%; height: auto;">

                </div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

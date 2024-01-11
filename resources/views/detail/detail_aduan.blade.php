@extends('layouts.admin')

@section('main-content')

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
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Detail Aduan') }}</h1>

    <!-- Display pengaduan details in a card -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nama :</strong></p>
                    <p><strong>No Telepon:</strong></p>
                    <p><strong>Tanggal:</strong></p>
                    <p><strong>Status:</strong></p>
                    <p><strong>Aduan:</strong></p>
                    <p><strong>Foto:</strong></p>
                </div>
                <div class="col-md-9">
                    <p>{{ $pengaduan->name }}</p>
                    <p>{{ $pengaduan->nomer_telp }}</p>
                    <p>{{ $pengaduan->created_at->format('l, d F Y') }}</p>
                    @if($pengaduan->status =='Belum di Proses')
                                    <p>
                                        <span style="color: #e53e3e; background-color: #fed7d7;"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                            {{ $pengaduan->status }}
                                        </span>
                                    </p>
                                    @elseif ($pengaduan->status =='Sedang di Proses')
                                    <p>
                                        <span style="color: #ed8936; background-color: #fbd38d;"
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                            {{ $pengaduan->status }}
                                        </span>
                                    </p>
                                    @else
                                    <p>
                                        <span style="color: #48bb78; background-color: #c6f6d5;"
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                            {{ $pengaduan->status }}
                                        </span>
                                    </p>
                                    @endif
                    <p>{{ $pengaduan->description }}</p>
                    <img src="{{ asset('storage/' . $pengaduan->image) }}" alt="Pengaduan Image" style="max-width: 50%; height: auto;">
                </div>
            </div>

           
        </div>
    </div>
    <!-- Tampilan tanggapan -->
<div class="card mb-4">
    <div class="card-body">
        <div class="px-4 py-3 mb-8 flex bg-white rounded-lg shadow-md dark:text-gray-400 dark:bg-gray-800">
            <div class="text-center flex-1">
                <h1 class="mb-8 font-semibold" style="color: black">Tanggapan</h1>
                
                @if ($tangap->isEmpty())
                    <p class="text-black-800 dark:text-black-400" style="font-weight: bold">
                        Aduan belum ditanggapi
                    </p>
                @else
                    @foreach ($tangap as $tangapan)
                        <p class="text-black-800 dark:text-black-400" style="font-weight: bold">
                            {{ $tangapan->tanggapan }}
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


    <div class="flex justify-center my-6 mx-auto">
        @if(auth()->user() && (auth()->user()->role == 'admin' || auth()->user()->role == 'satpam'))
        <a href="{{ route('tanggapan.show', $pengaduan->id)}}"
            class="btn btn-danger">
            Berikan Tanggapan
        </a>
        <a href="{{ url('/admin/pengaduan') }}" class="btn btn-secondary ml-2">
            Kembali
        </a>
        @endif
        @if(auth()->user() && (auth()->user()->role == 'warga'))
        <a href="{{ url()->previous() }}" class="btn btn-secondary ml-2">
            Kembali
        </a>
        @endif
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

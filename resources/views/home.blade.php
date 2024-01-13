@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Dashboard') }}</h1>

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
    @if(auth()->user() && (auth()->user()->role == 'admin' || auth()->user()->role == 'satpam'))
<div class="row mb-4">
    <div class="col-lg-3 mt-1">
        <div class="bg-primary text-light p-2 rounded-lg shadow shadow-sm text-center">
            <h2 class="display-4 mb-0 font-weight-bolder">{{ optional($RT)->count() ?? 0 }} RT</h2>
            <a href="{{ route('export.rt') }}" class="btn btn-light btn-block btn-sm">Export Excel</a>
        </div>
    </div>

    <div class="col-lg-3 mt-1">
        <div class="bg-warning text-light p-2 rounded-lg shadow shadow-sm text-center">
            <h2 class="display-4 mb-0 font-weight-bolder">{{ optional($KK)->count() ?? 0 }} KK</h2>
            <a href="{{ route('export.kk') }}" class="btn btn-light btn-block btn-sm">Export Excel</a>
        </div>
    </div>

    <div class="col-lg-3 mt-1">
        <div class="bg-info text-light p-2 rounded-lg shadow shadow-sm text-center border">
            <h2 class="display-4 mb-0 font-weight-bolder">{{ optional($K)->count() ?? 0 }} W</h2>
            <a href="{{ route('export.k') }}" class="btn btn-light btn-block btn-sm">Export Excel</a>
        </div>
    </div>
</div>
@endif
   <div class="row">
    @if($pengumumans->count() > 0)
        @foreach($pengumumans->chunk(ceil($pengumumans->count() / 100)) as $column)
            {{-- Column --}}
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-default mb-4">
                    <div class="card-header card-header-border-bottom" style="border-bottom: 2px solid #007bff; padding-bottom: 20px;">
                        <h1 class="h3 text-gray-800" style="font-weight: bold; margin: 0;">{{ __('Pengumuman') }}</h1>
                    </div>

                    <div class="card-body">
                        @foreach($column as $pengumuman)
                            <h5 class="card-title text-primary">{{ $pengumuman->judul_pengumuman }}</h5>
                            <p class="card-text pb-3">{{ $pengumuman->isi_pengumuman }}</p>
                            <p class="card-text">
                                <small class="text-muted">{{ $pengumuman->tgl_pengumuman }}</small>
                            </p>
                            <a href="{{ route('pengumuman.detail', ['id' => $pengumuman->id]) }}" type="button" class="btn btn-primary mt-4" data-toggle="modals">
                                Lihat
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-lg-12">
            <div class="alert alert-info" role="alert">
                <strong>No Pengumuman available.</strong>
            </div>
        </div>
    @endif
</div>


    
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

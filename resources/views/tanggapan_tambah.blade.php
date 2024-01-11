@section('main-content')
@extends('layouts.admin')

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
        <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Berikan Tanggapan') }}</h1>
        
        <!-- Formulir Tanggapan -->
        <form action="{{ route('tanggapan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pengaduan_id" value="{{ $item->id }} ">
            <div class="form-group">
                <label for="tanggapan">Isi Tanggapan Anda<span style="color: red;">*</span></label>
                <textarea class="form-control" id="tanggapan" name="tanggapan" placeholder="Isi tanggapan Anda" rows="8" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="status">Status<span style="color: red;">*</span></label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Belum di Proses" {{ $item->status == 'Belum di Proses' ? 'selected' : '' }}>Belum di Proses</option>
                    <option value="Sedang di Proses" {{ $item->status == 'Sedang di Proses' ? 'selected' : '' }}>Sedang di Proses</option>
                    <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>            
            

            <div class="text-center mt-4">
                <button style="width: 100%" type="submit" class="btn btn-danger btn-lg">Tanggapi</button>
            </div>
            
            <div class="text-center mt-4">
                <a style="width: 100%" type="back" class="btn btn-primary btn-lg" href="{{ url()->previous() }}">
                    Kembali
                </a>
            </div>
        </form>
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

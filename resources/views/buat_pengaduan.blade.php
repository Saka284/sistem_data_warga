@section('main-content')
    @extends('layouts.admin')

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center" style="font-weight: bold">Form Laporan</h2>

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

                <form action="{{ route('store_pengaduan') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="description">Isi Laporan Anda dan sertakan lokasi dengan jelas<span style="color: red;">*</span></label>
                        <textarea class="form-control" id="description" name="description" placeholder="Isi laporan Anda dan sertakan lokasi dengan jelas" rows="8" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nomer_telp">Nomor Telepon<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="nomer_telp" name="nomer_telp" value="{{ old('nomer_telp') }}" placeholder="Masukkan nomor telepon Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="foto" style="font-weight: bold">Pilih Foto</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="text-center mt-4">
                        <button style="width: 100%" type="submit" class="btn btn-danger btn-lg">Laporkan</button>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a style="width: 100%" type="back" class="btn btn-primary btn-lg" href="{{ url()->previous() }}">
                            Kembali ke halaman utama
                        </a>
                    </div>
                </form>
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

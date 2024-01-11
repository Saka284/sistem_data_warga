@section('main-content')
    @extends('layouts.admin')

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title" style="font-weight: bold">Buat Akun</h2>

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

                <form action="{{ route('tambah_user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nomer_telp">Nama<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="nomer_telp">Username<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="username" name="username"  placeholder="Masukkan username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password<span style="color: red;">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Password<span style="color: red;">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                                
                    <div class="form-group">
                        <label for="nomer_telp">Role<span style="color: red;">*</span></label>
                        <select type="text" class="form-control" id="role" name="role"  placeholder="Masukkan nomor role akun" required>
                            <option value="warga">Warga</option>
                            <option value="satpam">Saptam</option>
                        </select>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button style="width: 100%" type="submit" class="btn btn-primary btn-lg">
                            Buat Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        var confirmPasswordInput = document.getElementById('confirm_password');
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
        } else {
            confirmPasswordInput.type = 'password';
        }
    });
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

@extends('layouts.auth')

@section('main-content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{url('img/keluarga.png')}}" class="img-fluid" alt="keluarga">
        </div>
        <div class="col-lg-6">
            <h1 class="lead font-weight-bold display-4 text-dark">DataWarga</h1>
            <p class="text-dark">Selamat datang di aplikasi DataWarga</p>
            <div class="bg-custom rounded-lg p-0 shadow shadow-sm">
                @if ($errors->any())
                    <div class="alert alert-danger border-left-danger" role="alert">
                        <ul class="pl-4 my-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="bg-primary p-2 m-0">
                    <h2 class="lead text-light font-weight-bold">Login</h2>
                </div>
                <div class="border p-3"> <!-- Add border class for the box -->
                    <form method="POST" action="{{ route('login') }}" class="user">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="username" placeholder="{{ __('Username') }}" value="{{ old('username') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <small class="text-dark">Developed by @sakawijaya</small>
        </div>
    </div>
</div>
@endsection

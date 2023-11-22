@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-weight: bold">{{ __('Dashboard') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 mt-1">
            <div class="bg-primary text-light p-2 rounded-lg shadow shadow-sm text-center">
                <h2 class="display-4 mb-0 font-weight-bolder">{{ optional($RT)->count() ?? 0 }} RT</h2>
                <a href="" class="btn btn-light btn-block btn-sm">Export Excel</a>
            </div>
        </div>

        <div class="col-lg-3 mt-1">
            <div class="bg-warning text-light p-2 rounded-lg shadow shadow-sm text-center">
                <h2 class="display-4 mb-0 font-weight-bolder">{{ optional($RT)->count() ?? 0 }} KK</h2>
                <a href="" class="btn btn-light btn-block btn-sm">Export Excel</a>
            </div>
        </div>

        <div class="col-lg-3 mt-1">
            <div class="bg-info text-light p-2 rounded-lg shadow shadow-sm text-center border">
                <h2 class="display-4 mb-0 font-weight-bolder">{{ optional($RT)->count() ?? 0 }} W</h2>
                <a href="" class="btn btn-light btn-block btn-sm">Export Excel</a>
            </div>
        </div>
    </div>
    
@endsection

@extends('adminlte::page')
@section('title','Halaman Utama')
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Beranda') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang {{Auth::user()->name}}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

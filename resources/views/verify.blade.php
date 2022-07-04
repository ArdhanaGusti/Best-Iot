@extends('layout.template')

@section('title')
    <title>Verifikasi</title>
    
@endsection

@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('header')
    @include('layout.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <img src="https://www.freepnglogos.com/uploads/email-logo-png-27.png" style="width: 12.5rem" alt="">
            <p class="lead text-gray-800 mb-5">Silahkan verifikasi email</p>
        </div>
    </div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
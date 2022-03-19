@extends('layouts.login')
@section('title', 'Login Ruang Sosial')
@section('content')



<img class="log">
<div class="loginbox">
    <img src="{{ url('login_assets/img/logo_login.png') }}" class="avatar">
    <h1>{{ __('Silahkan Login') }}</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <p> {{ __('Email') }}</p><br>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <p> {{ __('Password') }}</p>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password" required autocomplete="current-password"><br>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="submit" name="" value="Login">
        <a>Belum punya akun?</a><br>
        <a href="{{ route('register') }}">Silahkan Registrasi</a><br>
        <a href="{{ route('home') }}" class="btn btn-primary">Balik ke home</a>
    </form>
</div>

@endsection
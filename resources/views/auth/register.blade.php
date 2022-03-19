@extends('layouts.register')
@section('title', 'Registrasi Ruang Sosial')
@section('content')


<img class="log">
<div class="loginbox">
    <img src="{{ url('login_assets/img/logo_register.png') }}" class="avatar">
    <h1>{{ __('Silahkan Registrasi') }}</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p> {{ __('Nama') }}</p>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama"
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror


        <p> {{ __('Email') }}</p>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Masukan Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror



        <p> {{ __('Katasandi') }}</p>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" placeholder="Masukan Katasandi" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <p> {{ __('Konfirmasi Katasandi') }}</p>
        <input id="password-confirm" type="password"
            class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation"
            placeholder="Masukan Konfirmasi Katasandi" required autocomplete="new-password">
        @error('password-confirm')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="submit" value="Register">
        <a>Sudah punya akun?</a><br>
        <a href="{{ route('login') }}">Silahkan Login</a><br>
        <a href="{{ route('home') }}" class="btn btn-primary">Balik ke home</a>
    </form>
</div>


@endsection

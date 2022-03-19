@extends('layouts.setting')
@section('title', 'Ubah Password Akun')
@section('content')



<img class="log">
<div class="loginbox">
    <img src="{{ url('login_assets/img/logo_login.png') }}" class="avatar">
    <h1>{{ __('Silahkan Ubah Nama/Password') }}</h1>

   <div class="card-body">
        <form method="POST" action="{{ route('update-settings',$item->user_id) }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Anda') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{$item->name}}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" required>
                </div>
            </div>
            @if ($errors->has('password_lama'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_lama') }}</strong>
            </span>
            @endif
            @if(session('error'))
            <style type="text/css">
                .warna {
                    color: red;
                }
            </style>
            <span class="invalid-feedback text-danger" role="alert">
                <strong class="warna">Maaf ! {{ session('error') }}</strong>
            </span>
            @endif
            <br>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <style type="text/css">
                        .warna {
                            color: red;
                        }
                    </style>
                    <span class="invalid-feedback warna" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password Baru') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required
                        autocomplete="new-password">
                    @error('password')
                    <style type="text/css">
                        .warna {
                            color: red;
                        }
                    </style>
                    <span class="invalid-feedback warna" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="submit" name="" value="Ubah">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a href="{{ route('home') }}" style="color:#eeff00;">Kembali KeHome
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

@extends('layouts.home.home')
@section('title','Sukses')
@section('content')

@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif

<div class="container" style="margin-top: 150px;">
    <div class="row mb-4">
        <div class="col text-center">
            <h2>Terima Kasih Telah Berdonasi</h2>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">

            <img src="{{ url('assets/img/279.gif') }}" width="200" alt="">



        </div>

    </div>
    <div class="row mt-5">
        <div class="col text-center">
            <a class="btn btn-color" href="{{route('home')}}">Home</a>
        </div>
    </div>
</div>





@endsection

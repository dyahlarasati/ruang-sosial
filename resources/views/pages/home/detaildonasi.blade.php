@extends('layouts.home.home')
@section('title','Detail Donasi')

@section('content')


            <section id="inner-headline" style="background-color: #2596ff">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="pageTitle" >Donasi</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <div class="container content">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="about-logo text-center">
                                <h3>Daftar Donasi</h3>
                                <p>Berikanlah bantuan seiklhasnya walaupun tidak punya banyak uang, silahkan donasi !</p>
                            </div>
                            <!-- <a href="#" class="btn btn-color">Read more</a>   -->
                        </div>
                    </div>
                    {{-- @foreach($uang as $item)
                    <h1>{{ $item->donasi->nama_donatur }} @currency($item->nominal)</h1>
                    @endforeach --}}
                    <!-- Service Blcoks -->
                    <div class="row service-v1 margin-bottom-40">
                        @foreach($items as $item)
                        <div class="col-md-4 card-donasi md-margin-bottom-40">

                            <img class="card-img-top" src="{{Storage::url($item->foto_aktivitas)}}" alt="" >
                            <h4>{{$item->tempat_donasi->nama_tempat_donasi}}</h4>
                            <p>{{$item->tempat_donasi->lokasi_donasi}}
                            <hr>
                            <h5>Total Donatur</h5>
                            <p style="color: #000; font-size:16px" class="text-bold mx-3">
                               {{\App\Donasi::where('status_verifikasi', true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->count()}}
                               <span style="color:#000000; font-size:15px;" class="floatright"> <a href="{{route('detail-donatur',$item->id_aktivitas_donasi)}}">Detail</a></span>
                            </p>
                            <p class="text-dark text-bold "> Kontak Koordinator :
                                <span style="color:#000000; font-size:15px;" class="floatright"> {{$item->kontak_koordinator}}</span>
                            </p>

                            <p class="mx-3 text-dark text-bold "> Total Uang
                                <span style="color:#bc1a1a; font-size:15px;" class="floatright"> @currency(\App\Donasi::where('status_verifikasi',
                                true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->get('nominal')->sum('nominal'))</span>
                            </p>

                            <a href="{{route('konfirmasi-donasi',$item->id_aktivitas_donasi)}}" class="btn btn-color col-md-12">Donasi</a>
                        </div>
                        @endforeach



                    </div>
                    <!-- End Service Blcoks -->


            </section>



@endsection

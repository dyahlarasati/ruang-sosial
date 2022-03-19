@extends('layouts.home.home')
@section('title','Ruang Sosial')
@section('content')
<style>
.img {
width: 150px;
height: 150px;
position: relative;
left: 28%; right:0px;
border-radius: 50%;
}
</style>
<section id="featured">

    <!-- Slider -->
    <div id="main-slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="{{ url('assets/img/slides/slide1.jpg') }}" alt="" />

                <div class="flex-caption">

                    <a href="{{route('detail-donasi.index')}}" class="btn donasi-btn btn-lg">Donasi Sekarang</a>
                    {{-- @foreach ($items as $item) --}}
                    {{-- <a href="" class="btn kegiatan-btn btn-lg">Membuat Kegiatan</a> --}}
                    {{-- @endforeach --}}

                </div>

            </li>
        </ul>
    </div>
    <!-- end slider -->

</section>
<div class="content_white">
    <h2>Donasi Saat ini!</h2>
</div>
<div class="featured_content">
    <div class="container">
        <div class="row ">
            @foreach($items as $item)

            <div class="col-md-4 feature_grid1 "><h4 class="text-center">{{$item->tempat_donasi->nama_tempat_donasi}}</h4> <img class="img" src="{{Storage::url($item->foto_aktivitas)}}" alt="" />
                <hr>
                <p>{{$item->tempat_donasi->lokasi_donasi}}</p>
                    <h5>Total Donatur</h5>
                    <p style="color: #000; font-size:16px" class="text-bold mx-3">
                        {{\App\Donasi::where('status_verifikasi', true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->count()}}
                        <span style="color:#000000; font-size:15px;" class="floatright"> <a
                                href="{{route('detail-donatur',$item->id_aktivitas_donasi)}}">Detail</a></span>
                    </p>
                    <p class="text-dark text-bold "> Kontak Koordinator :
                        <span style="color:#000000; font-size:15px;" class="floatright"> {{$item->kontak_koordinator}}</span>
                    </p>

                    <p class="mx-3 text-dark text-bold "> Total Uang
                        <span style="color:#bc1a1a; font-size:15px;" class="floatright"> @currency(\App\Donasi::where('status_verifikasi',
                        true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->get('nominal')->sum('nominal'))</span>
                    </p>
                <a href="{{route('detail-donasi.index')}}" class="feature_btn col-md-12 text-center">Lihat Info</a>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

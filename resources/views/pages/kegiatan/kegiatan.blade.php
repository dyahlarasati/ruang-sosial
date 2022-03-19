@extends('layouts.home.home')
@section('title','Kegiatan Sosial')

@section('content')

<section id="inner-headline" style="background-color: #2596ff">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Kegiatan Sosial</h2>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="about-logo text-center">



                    <hr>
                    <p>Melakukan kegiatan sangatlah penting, maka dari itu mari kita berpartisipasi melakukan kegiatan !
                    </p>
                </div>
                <!-- <a href="#" class="btn btn-color">Read more</a>   -->
            </div>
        </div>
        <!-- Service Blcoks -->
        <div class="row service-v1 margin-bottom-40">
            @foreach($items as $item)
            <div class="col-md-4 card-donasi md-margin-bottom-40">

                <img class="card-img-top" src="{{Storage::url($item->foto_kegiatan)}}" alt="">


                <h4 class="text-center">{{ $item->nama_kegiatan }}</h4>

                <p class="text-dark text-bold "> Lokasi Kegiatan : {{$item->tempat_kegiatan->nama_tempat_kegiatan}}
                    <span style="color:#000000; font-size:15px;" class="floatright">
                       </span>
                </p>

                <p class="text-dark text-bold "> Tanggal Kegiatan :
                    <span style="color:#000000; font-size:15px;" class="floatright">
                        {{$item->tanggal_kegiatan}}</span>
                </p>


                <p class="text-dark text-bold "> Waktu Kegiatan :
                    <span style="color:#000000; font-size:15px;" class="floatright">
                        {{$item->waktu_kegiatan}} - Selesai</span>
                </p>
                <p class="text-dark text-bold " style="color: #000; font-size:16px"> Yang ikut berpartisipasi
                <span style="color: #000; font-size:16px" class="text-bold mx-3 floatright">
                    {{\App\PartisipasiKegiatan::where('status_verifikasi', true)->where('id_kegiatan',$item->id_kegiatan)->count()}} Orang</span>
                </p>

                {{-- <a href="" class="btn btn-color col-md-12">Ikut Berpartisipasi</a> --}}
                <a href="{{route('partisipasi-kegiatan',$item->id_kegiatan)}}" class="btn btn-color col-md-12">Ikut Berpartisipasi</a>
            </div>
            @endforeach


        </div>
        <!-- End Service Blcoks -->


</section>
@endsection

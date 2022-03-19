@extends('layouts.home.home')
@section('title','History Kegiatan')

@section('content')

<!-- End Page Title Area -->

<section id="featured">
    <section id="inner-headline" style="background-color: #2596ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">History Kegiatan</h2>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="content">
    <div class="container content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="about-logo text-center">
                    <h3>History Kegiatan {{Auth::user()->name}}</h3>
                </div>
                <!-- <a href="#" class="btn btn-color">Read more</a>   -->
            </div>
        </div>
        <div class="container">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_history" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Tanggal Partisipasi Kegiatan</th>
                                <th>ID Partisipasi Kegiatan</th>
                                {{-- <th>Nama Kegiatan</th> --}}
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>


                            @forelse ($items as $item)
                            <tr>
                                <td>{{Carbon\Carbon::create($item->tanggal_partisipasi)->translatedFormat('l, d F Y')}}</td>
                                <td>{{$item->id_partisipasi_kegiatan}}</td>
                                {{-- <td>{{ $item->nama_kegiatan }}</td> --}}
                                <td class="{{$item->status_verifikasi ? 'text-success' : 'text-muted'}}">
                                    {{$item->status_verifikasi ? 'Sudah Dikonfirmasi' : 'Belum Dikonfirmasi'}}
                                </td>
                            </tr>
                            @empty

                            <tr>
                                <td colspan="6" class="text-center">Maaf ! Anda Belum Pernah Berpartisipasi</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>











<!-- End Riwayat Donasi Area -->




@endsection

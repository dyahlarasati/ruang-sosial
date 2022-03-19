@extends('layouts.home.home')
@section('title','History Donasi')

@section('content')

<!-- End Page Title Area -->

<section id="featured">
    <section id="inner-headline" style="background-color: #2596ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">History Donasi</h2>
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
                    <h3>History Donasi {{Auth::user()->name}}</h3>
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

                            <th>Tanggal Donasi</th>
                            <th>ID Donasi</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>


                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->tanggal_donasi }}</td>
                            <td>{{$item->id_donasi}}</td>
                            <td>@currency($item->nominal)</td>
                            <td class="{{$item->status_verifikasi ? 'text-success' : 'text-muted'}}">
                                {{$item->status_verifikasi ? 'Sudah Dikonfirmasi' : 'Belum Dikonfirmasi'}}
                            </td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="6" class="text-center">Maaf ! Anda Belum Pernah Melakukan Donasi</td>
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

@extends('layouts.home.home')
@section('title','Detail Donatur')

@section('content')

<!-- End Page Title Area -->

<section id="featured">
    <section id="inner-headline" style="background-color: #2596ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">Detail Donatur</h2>
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
                    <h3>Detail Donatur</h3>
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
                                <th>Nama Donatur</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($donasi as $d)
                            <tr>
                                <td>{{$d->tanggal_donasi}}</td>
                                <td>{{$d->nama_donatur}}</td>
                               <td class="text-right">@currency($d->nominal)</td>
                            </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

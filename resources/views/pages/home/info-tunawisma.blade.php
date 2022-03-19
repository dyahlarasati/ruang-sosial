@extends('layouts.home.home')
@section('title','Info Tunawisma')

@section('content')

<!-- End Page Title Area -->

<section id="featured">
    <section id="inner-headline" style="background-color: #2596ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">Info Tunawisma</h2>
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
                    <h3>Info Tunawisma</h3>
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

                                <th>ID Tunawisma</th>
                                <th>Nama Panti</th>
                                <th>Nama Tunawisma</th>
                                <th>Tanggal Lahir</th>
                                <th>Nama Orang Tua</th>
                                <th>Keterangan Keluarga</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($info as $item)
                                {{-- @foreach(App\AdminModel\Tunawisma::with(['panti'])
                                    ->where('id_panti',$item->id_panti)->withTrashed()->get() as $item) --}}
                            <tr>
                                <td>{{ $item->id_tunawisma }}</td>
                                <td>{{ $item->panti->nama_panti }}</td>
                                <td>{{ $item->nama_tunawisma }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->nama_orang_tua }}</td>
                                <td>{{ $item->keterangan_keluarga }}</td>

                            </tr>

                            {{-- <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr> --}}

                            {{-- @endforeach --}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
















@endsection

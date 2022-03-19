@extends('layouts.home.home')
@section('title','Data Tunawisma')

@section('content')

<!-- End Page Title Area -->

<section id="featured">
    <section id="inner-headline" style="background-color: #2596ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">Data Tunawisma</h2>
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
                    <h3>Data Tunawisma</h3>

                </div>
                <!-- <a href="#" class="btn btn-color">Read more</a>   -->
            </div>
        </div>

        <div class="container content">
        <div class="row">
            <div class="col-md-4 ">
        <!-- Accordion starts -->

               <div class="modal-body">
                <form action="{{ route('detail-tunawisma') }}" method="post">
                    @csrf

                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_panti">Tampilkan data berdasarkan Panti</label>
                                <select class="form-control" name="id_panti" id="id_panti">
                                    @foreach ($panti as $item)
                                    <option value="{{ $item->id_panti }}">{{ $item->nama_panti }}
                                    </option>

                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        </div>
        <!-- Accordion ends -->
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
                                <th>Nama Kepala Keluarga</th>
                                <th>Keterangan Keluarga</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($items as $item)
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

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

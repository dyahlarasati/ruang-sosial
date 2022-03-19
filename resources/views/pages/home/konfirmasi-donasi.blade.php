@extends('layouts.home.home')
@section('title','Konfirmasi Donasi')

@section('content')

<section id="featured">
<section id="inner-headline" style="background-color: #2596ff">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Konfirmasi Donasi</h2>
            </div>
        </div>
    </div>
</section>
</section>
    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div class="block-heading-two">
                    <h3><span>Transfer Bank</span></h3>
                </div>
                <!-- Accordion starts -->
                <div class="panel-group" id="accordion-alt3">
                    <!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
                    <div class="panel">
                        <!-- Panel heading -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bca" href="#bca">
                                    <i class="fa fa-angle-right"></i> BCA Only
                                </a>
                            </h4>
                        </div>
                        <div id="bca" class="panel-collapse collapse">
                            <!-- Panel body -->
                            <div class="panel-body">
                                Silahkan transfer ke bank BCA - 54712616321
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion ends -->
            </div>
            <div class="col-md-6">

                <h3>{{$id_aktivitas->tempat_donasi->nama_tempat_donasi}}</h3>

                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>
                <div class="alert alert-error hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>
                <form action="{{route('konfirmasi-donasi-create', $id_aktivitas)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="contact-form">
                    <form id="contact-form" role="form" novalidate="novalidate">
                        <div class="form-group has-feedback">
                            <label for="id_donasi">ID Donasi</label>
                            <input readonly type="text" class="form-control" id="id_donasi" name="id_donasi" value="{{$id}}" placeholder="No ID Donasi Anda">

                        </div>
                        <div class="form-group has-feedback">
                            <label for="nama_donatur">Nama Donatur</label>
                            <input readonly type="text" class="form-control" id="nama_donatur" name="nama_donatur" value="{{$item->name}}" placeholder="Masukkan Nama Donatur">
                            <i class="fa fa-user form-control-feedback"></i>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" name="nama_donatur_noname" type="checkbox" value="Anonim"
                                id="nama_donatur_noname">
                            <label class="form-check-label" for="nama_donatur_noname">
                                Sembunyikan Nama Saya
                            </label>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input readonly value="{{$item->email}}" type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
                            <i class="fa fa-envelope form-control-feedback"></i>
                        </div>
                        <div class="form-group">
                            <div class="form-group has-feedback">
                                <label for="nominal">Nominal</label>
                                <input  class="form-control mt-2" id="nominal" name="nominal"
                                    placeholder="Masukan Nominal" type="number">
                            </div>
                            @error ('nominal')
												<div class="invalid-feedback">
													{{$message}}
												</div>
												@enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="foto_bukti">Upload Bukti</label>
                            <input required type="file" name="foto_bukti"
                                class="form-control-file @error('foto_bukti') is-invalid @enderror" id="foto_bukti">
                                            @error ('foto_bukti')
											<div class="invalid-feedback">
												{{$message}}
											</div>
											@enderror
                        </div>
                        <input type="submit" value="Konfirmasi" class="btn btn-default col-md-12" style="height: 50px;"" onclick="return confirm('Udah bener belom data lu?');">
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection

{{-- @push('addon-script')
<script>
    function Checkradiobutton() {

        if (document.getElementById('r2').checked) {

            document.getElementById('nominal').disabled = false;
        } else {
            document.getElementById('nominal').disabled = true;
        }

        if (document.getElementById('r1').checked) {

            document.getElementById('keterangan').disabled = false;
        } else {
            document.getElementById('keterangan').disabled = true;
        }
    }



</script>
@endpush --}}

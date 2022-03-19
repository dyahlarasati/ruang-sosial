@extends('layouts.home.home')
@section('title','Ajukan Kegiatan')

@section('content')

<section id="featured">
    <section id="inner-headline" style="background-color: #2596ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">Ajukan Kegiatan</h2>
                </div>
            </div>
        </div>
    </section>
</section>
<div class="container">

    <div class="row">
        <div class="col-md-6">

            {{-- <div class="block-heading-two">
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
            </div> --}}
            <!-- Accordion ends -->
        </div>
        <div class="col-md-12 ">

            <h3></h3>

            <div class="alert alert-success hidden" id="contactSuccess">
                <strong>Success!</strong> Your message has been sent to us.
            </div>
            <div class="alert alert-error hidden" id="contactError">
                <strong>Error!</strong> There was an error sending your message.
            </div>
            <form action="{{route('partisipasi-kegiatan-create', $id_kegiatan)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="contact-form form-center">
                    <form id="contact-form" role="form" novalidate="novalidate">
                        <div class="form-group has-feedback">
                            <label for="id_partisipasi_kegiatan">ID Partisipasi Kegiatan</label>
                            <input readonly type="text" class="form-control" id="id_partisipasi_kegiatan" name="id_partisipasi_kegiatan"
                                value="{{ $id }}" placeholder="No ID Kegiatan Anda">

                        </div>
                        <div class="form-group has-feedback">
                            <label for="nama">Nama</label>
                            <input readonly type="text" class="form-control" id="nama" name="nama"
                                value="{{$item->name}}" placeholder="Masukkan Nama Anda">
                            <i class="fa fa-user form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input readonly value="{{$item->email}}" type="email" class="form-control" id="email"
                                name="email" placeholder="Masukan Email">
                            <i class="fa fa-envelope form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="alasan">Alasan Berpartisipasi</label>
                            <textarea type="text" class="form-control" id="alasan" name="alasan" value=""
                                placeholder="Masukkan Alasan Berpartisipasi"></textarea>
                        </div>
                        {{-- <div class="form-group has-feedback">
                            <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                            <input readonly value="{{$id_kegiatan->tempat_kegiatan->nama_tempat_kegiatan}}" type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value=""
                                placeholder="Masukkan Lokasi Kegiatan">
                            <i class="fas fa-location form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="tanggal_kegiatan_berlangsung">Tanggal Kegiatan Berlangsung</label>
                            <input readonly value="{{$id_kegiatan->waktu_kegiatan}}" type="date" class="form-control" id="tanggal_kegiatan_berlangsung" name="tanggal_kegiatan_berlangsung" value=""
                                placeholder="Masukkan Tanggal Kegiatan Berlangsung">
                            <i class="fa fa-user form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="waktu_kegiatan">Waktu Kegiatan</label>
                            <input type="time" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value=""
                                placeholder="Masukkan Waktu Kegiatan">
                            <i class="fa fa-user form-control-feedback"></i>
                        </div> --}}
                        <div class="form-group mt-3">
                            <label for="bukti_pengajuan">Upload Identitas/KTP</label>
                            <input required type="file" name="bukti_pengajuan"
                                class="form-control-file @error('bukti_pengajuan') is-invalid @enderror" id="bukti_pengajuan">
                            @error ('bukti_pengajuan')
                            <div class="invalid-feedback text-danger">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                        <input type="submit" value="Konfirmasi" class="btn btn-default col-md-12"
                            style="height: 50px;"" onclick=" return confirm('Udah bener belom data lu?');">
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('layouts.admin.admin')
@section('title','Tambah Kegiatan')



@section('content')

<!-- Begin Page Content -->
<div class="container-fluid ">
    <h3>Tambah Kegiatan</h3>


    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="{{route('data-kegiatan.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="id_tempat_kegiatan">Panti</label>
                    <select name="id_tempat_kegiatan" required
                        class="form-control @error('id_tempat_kegiatan') is-invalid @enderror">
                        <option value="">Pilih Panti</option>
                        @foreach ($tempat_kegiatan as $tempat)
                        <option value="{{$tempat->id_tempat_kegiatan}}">Nama Tempat Kegiatan :
                            {{$tempat->nama_tempat_kegiatan}}</option>
                        @endforeach
                    </select>
                    @error ('id_tempat_kegiatan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan"
                        class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan"
                        rows="3"></input>
                </div>
                @error ('nama_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan"
                        class="form-control @error('tanggal_kegiatan') is-invalid @enderror" id="tanggal_kegiatan"
                        rows="3"></input>
                </div>
                @error ('tanggal_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="waktu_kegiatan">Waktu Kegiatan</label>
                    <input type="time" name="waktu_kegiatan"
                        class="form-control @error('waktu_kegiatan') is-invalid @enderror" id="waktu_kegiatan"
                        rows="3"></input>
                </div>
                @error ('waktu_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="foto_kegiatan">Foto Kegiatan</label>
                    <input type="file" name="foto_kegiatan"
                        class="form-control @error('foto_kegiatan') is-invalid @enderror" placeholder="foto_kegiatan">
                    @error ('foto_kegiatan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection

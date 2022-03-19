@extends('layouts.admin.admin')
@section('title','Tambah Aktivitas')



@section('content')

<!-- Begin Page Content -->
<div class="container-fluid ">
    <h3>Tambah Aktivitas Donasi</h3>


    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="{{route('data-aktivitas.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="id_tempat_donasi">Panti</label>
                    <select name="id_tempat_donasi" required
                        class="form-control @error('id_tempat_donasi') is-invalid @enderror">
                        <option value="">Pilih Panti</option>
                        @foreach ($tempat_donasi as $tempat)
                        <option value="{{$tempat->id_tempat_donasi}}">Tempat Donasi :
                        {{$tempat->nama_tempat_donasi}}, - Lokasi : {{$tempat->lokasi_donasi}} </option>
                        @endforeach
                    </select>
                    @error ('id_tempat_donasi')
                    <div class="invalid-feedback">
                        {{$message}}
                </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="foto_aktivitas">Foto Aktivitas</label>
            <input type="file" name="foto_aktivitas" class="form-control @error('foto_aktivitas') is-invalid @enderror"
                placeholder="foto_aktivitas">
            @error ('foto_aktivitas')
                    <div class="invalid-feedback">
                        {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="kontak_koordinator">Kontak Koordinator</label>
        <input type="number" name="kontak_koordinator"
            class="form-control @error('kontak_koordinator') is-invalid @enderror" id="kontak_koordinator"
            rows="3"></input>
    </div>
    @error ('kontak_koordinator')
                <div class="invalid-feedback">
                    {{$message}}
</div>
@enderror






<button type="submit" class="btn btn-primary btn-block">Simpan</button>
</form>
</div>
</div>


</div>
<!-- /.container-fluid -->
@endsection

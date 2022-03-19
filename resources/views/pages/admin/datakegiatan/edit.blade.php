@extends('layouts.admin.admin')
@section('title','Edit Kegiatan')

@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid ">
    <h3>Edit Kegiatan</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-10 offset-1 mt-4 border rounded">
        <form class="my-3" action="{{route('data-kegiatan.update', $item->id_kegiatan)}}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf



            <div class="form-group">
                <label for="foto_kegiatan">Foto Kegiatan</label>
                <input required type="file" name="foto_kegiatan" class="form-control @error('foto_kegiatan') is-invalid @enderror"
                    value="{{ $item->foto_kegiatan }}">

                    <img src="{{ Storage::url($item->foto_kegiatan) }}" width="110" height="110">
                @error ('foto_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kontak_koordinator">Nama Kegiatan</label>

                <input type="text" name="nama_kegiatan"
                    class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan"
                    rows="3" value="{{$item->nama_kegiatan}}"></input>
                @error ('nama_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>

                <input type="date" name="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
                    id="tanggal_kegiatan" rows="3" value="{{$item->tanggal_kegiatan}}"></input>
                @error ('tanggal_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="waktu_kegiatan">Waktu Kegiatan</label>

                <input type="time" name="waktu_kegiatan" class="form-control @error('waktu_kegiatan') is-invalid @enderror"
                    id="waktu_kegiatan" rows="3" value="{{$item->waktu_kegiatan}}"></input>
                @error ('waktu_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>




            <div class="col col-md-6 offset-md-3 mt-4">
                <button type="submit" class="btn btn-success btn-block">Ubah</button>
            </div>
        </form>

    </div>


</div>
<!-- /.container-fluid -->




@endsection

@push('addon-script')
<!-- Page level plugins -->
<script src="{{url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{url('admin/js/demo/datatables-demo.js')}}"></script>


@endpush

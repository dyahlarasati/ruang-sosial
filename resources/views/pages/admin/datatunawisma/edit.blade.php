@extends('layouts.admin.admin')
@section('title','Edit Tunawisma')

@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid ">
    <h3>Edit Tunawisma</h3>
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
        <form class="my-3" action="{{route('data-tunawisma.update', $item->id_tunawisma)}}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="nama_tunawisma">Nama Tunawisma</label>

                <input type="text" name="nama_tunawisma"
                    class="form-control @error('nama_tunawisma') is-invalid @enderror" id="nama_tunawisma"
                    rows="3" value="{{$item->nama_tunawisma}}"></input>
                @error ('nama_tunawisma')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>

                <input type="date" name="tanggal_lahir"
                    class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" rows="3"
                    value="{{$item->tanggal_lahir}}"></input>
                @error ('tanggal_lahir')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_orang_tua">Nama Kepala Keluarga</label>

                <input type="text" name="nama_orang_tua"
                    class="form-control @error('nama_orang_tua') is-invalid @enderror" id="nama_orang_tua" rows="3"
                    value="{{$item->nama_orang_tua}}"></input>
                @error ('nama_orang_tua')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan_keluarga">Keterangan Keluarga</label>
                <select name="keterangan_keluarga" id="keterangan_keluarga" required class="form-control @error('keterangan_keluarga') is-invalid @enderror">
                    <option>{{$item->keterangan_keluarga}}</option>
                    <option value="YATIM">YATIM</option>
                    <option value="PIATU">PIATU</option>
                    <option value="YATIM_PIATU">YATIM_PIATU</option>

                </select>
                @error ('keterangan_keluarga')
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

@extends('layouts.admin.admin')
@section('title','Data Tempat Kegiatan')

@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    @if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
    @endif
    @if (session('dihapus'))
    <div class="alert alert-success" role="alert">
        {{session('dihapus')}}
    </div>
    @endif

    <!-- Page Heading -->

    <button data-toggle="modal" data-target="#modalTambah" class="btn btn-success mb-3" name="tambah"
        id="tambah">Tambah</button>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tempat Donasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="100">ID Tempat Donasi</th>
                            <th>Nama Tempat Kegiatan</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id_tempat_kegiatan}}</td>
                            <td>{{$item->nama_tempat_kegiatan}}</td>
                            <td>

                                <form action="{{route('data-tempat-kegiatan.destroy',$item->id_tempat_kegiatan)}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button name="hapus" id="hapus" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>

    <!--  Tambah Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tempat Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('data-tempat-kegiatan.store')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nama_tempat_kegiatan">Nama Tempat Kegiatan</label>
                            <input type="text" name="nama_tempat_kegiatan" class="form-control @error('nama_tempat_kegiatan') is-invalid @enderror" id="nama_tempat_kegiatan" placeholder="Masukkan Nama Tempat Kegiatan" value="{{old('nama_tempat_kegiatan')}}">
                            @error ('nama_tempat_kegiatan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection



    @push('addon-script')
    <!-- Page level plugins -->
    <script src="{{url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('admin/js/demo/datatables-demo.js')}}"></script>
    @endpush


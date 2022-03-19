@extends('layouts.admin.admin')
@section('title','Data Aktivitas')

@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<style type="text/css">
    .warna {
        color: rgb(0, 0, 0);
    }
</style>
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
    @if (session('edit'))
    <div class="alert alert-success" role="alert">
        {{session('edit')}}
    </div>
    @endif
    <!-- Page Heading -->

<h1 class="h3 mb-2 warna text-center">Data Aktivitas Donasi</h1>

    <!-- DataTales Example -->
    <div class=" card shadow mb-4">
        <div class="card-header py-3 warna">
            <h6 class="m-0 font-weight-bold warna mb-3">Aktivitas Donasi</h6>
            <a href="{{route('data-aktivitas.create')}}" class="btn btn-primary btn-sm btn-rounded float-left">
                <i class="fas fa-fw fa-plus"></i> {{ __('Tambah Aktivitas Donasi') }}
            </a>
        </div>
        <div class="card-body warna">
            <div class="table-responsive warna">
                <table class="table table-bordered warna" id="tableAkt" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Aktivitas Donasi</th>
                            <th>Nama Panti</th>
                            <th>Lokasi Panti</th>
                            <th>Kontak Koordinator</th>
                            <th>Foto</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id_aktivitas_donasi}}</td>
                            <td>{{$item->tempat_donasi->nama_tempat_donasi}}</td>
                            <td>{{$item->tempat_donasi->lokasi_donasi}}</td>
                            <td>{{$item->kontak_koordinator}}</td>
                            <td><img src="{{Storage::url($item->foto_aktivitas)}}" alt="" style="width:150px"
                                    class="img-thumbnail" /></td>
                            <td>
                                <a href="{{route('data-aktivitas.edit', $item->id_aktivitas_donasi)}}"
                                    class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('data-aktivitas.destroy',$item->id_aktivitas_donasi)}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button name="hapus" id="hapus" class="btn btn-danger btn-sm mt-2"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection


@push('addon-script')
<!-- Page level plugins -->
<script src="{{url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#tableAkt').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );
</script>
@endpush

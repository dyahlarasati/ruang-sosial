@extends('layouts.admin.admin')
@section('title','Data Kegiatan Masuk')
@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableKegiatan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Kegiatan Masuk</th>
                            <th>ID Partisipasi Kegiatan</th>
                            <th>Nama</th>
                            <th>Tanggal Masuk Kegiatan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id_kegiatan_masuk}}</td>
                            <td>{{$item->id_partisipasi_kegiatan}}</td>
                            <td>{{$item->partisipasi->nama}}</td>
                            <td>{{\Carbon\Carbon::create( $item->tanggal_kegiatan_masuk)->translatedFormat('l, d F Y')}}</td>
                        </tr>
                        @empty

                        <tr>
                            <td class="text-center" colspan="5">Data Kosong</td>
                        </tr>

                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('addon-script')

<!-- Page level plugins -->
<script src="{{url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function() {
    $('#tableKegiatan').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

</script>

@endpush

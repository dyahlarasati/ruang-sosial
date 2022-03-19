@extends('layouts.admin.admin')
@section('title','Kegiatan Masuk')
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
            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="kegiatanMasuk" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                        <th>ID Partisipasi Kegiatan</th>
                        <th>Nama</th>
                        <th>Alasan Berpartisipasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{$item->id_partisipasi_kegiatan}}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alasan }}</td>
                        <td class="{{$item->status_verifikasi ? 'text-success' : 'text-muted'}}">
                            {{$item->status_verifikasi ? 'Terverifikasi' : 'Pending'}}</td>
                        <td>
                            @if ($item->status_verifikasi==false)
                            @if ($item->uang)

                            @else
                            <a href="{{route('verifikasi-parti',$item->id_partisipasi_kegiatan)}}"
                                class="btn btn-success btn-sm">Verifikasi</a>
                            @endif
                            @else
                            <button disabled class="btn btn-secondary btn-sm">Terverifikasi</button>
                            @endif

                            <a target="_blank" href="{{Storage::url($item->bukti_pengajuan)}}">Lihat Foto</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data Kosong</td>
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
    $('#kegiatanMasuk').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

</script>

@endpush

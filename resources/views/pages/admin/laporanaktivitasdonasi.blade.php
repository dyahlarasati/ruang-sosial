@extends('layouts.admin.admin')
@section('title','Laporan Aktivitas Donasi')

@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">

    <div class="row ml-1 mb-3">
        <a href="{{ route('export-aktivitas-donasi-admin') }}" class="btn btn-sm btn-info ml-2 mt-2 shadow-sm">Cetak
            Semua</a>

        <button data-toggle="modal" data-target="#modalCetakPanti"
            class="btn btn-sm shadow-sm btn-warning ml-2 mt-2">Cetak Berdasarkan Panti</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Aktivitas Donasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="tableAktivitas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Aktivitas Donasi</th>
                            <th>Nama Panti</th>
                            <th>Lokasi Panti</th>
                            <th>Jumlah Nominal Donasi</th>
                            <th>Total Donasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{$item->id_aktivitas_donasi }}</td>
                            <td>{{$item->tempat_donasi->nama_tempat_donasi}}</td>
                            <td>{{ $item->tempat_donasi->lokasi_donasi }}</td>
                            <td class="text-right">@currency(\App\Donasi::where('status_verifikasi',
                            true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->sum('nominal'))</td>
                            <td>{{\App\Donasi::where('status_verifikasi', true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->count()}} Donasi</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection




<!-- Modal -->
<div class="modal fade" id="modalCetakPanti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Panti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('print-aktivitas-donasi-panti-admin') }}" method="post">
                    @csrf

                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_tempat_donasi">Pilih Panti</label>
                                <select class="form-control" name="id_tempat_donasi" id="id_tempat_donasi">
                                    @foreach ($tempat_donasi as $item)
                                    <option value="{{ $item->id_tempat_donasi }}">{{ $item->nama_tempat_donasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Cetak</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@push('addon-script')
<!-- Page level plugins -->
<script src="{{url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#tableAktivitas').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );
</script>
@endpush

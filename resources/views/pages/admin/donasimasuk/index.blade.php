@extends('layouts.admin.admin')
@section('title','Donasi Masuk')
@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
<style type="text/css">
    .warna {
        color: rgb(237, 12, 12);
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    @if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
    @endif
    <table cellpadding="8" class="table-responsive table-borderless mb-3 warna">
        <tr>
            <th>Total Donasi Masuk </th>
            <td>:</td>
            <td style="font-size:20px" class="warna">@currency($total_masuk)</td>
        </tr>
    </table>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Donasi Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableDonasi" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Donasi</th>
                            <th>Tanggal Donasi</th>
                            <th>Nama</th>

                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id_donasi}}</td>
                            <td>{{ $item->tanggal_donasi }}</td>
                            <td>{{$item->user->name}}</td>

                            <td>@currency($item->nominal)</td>
                            <td class="{{$item->status_verifikasi ? 'text-success' : 'text-muted'}}">
                                {{$item->status_verifikasi ? 'Terverifikasi' : 'Pending'}}</td>
                            <td>
                              @if ($item->status_verifikasi==false)
                            @if ($item->uang)

                            @else
                            <a href="{{route('verifikasi-uang',$item->id_donasi)}}" class="btn btn-success btn-sm">Verifikasi</a>
                            @endif
                            @else
                            <button disabled class="btn btn-secondary btn-sm">Terverifikasi</button>
                            @endif

                                <a target="_blank" href="{{Storage::url($item->foto_bukti)}}" >Lihat
                                    Foto</a>
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

<!-- Page level custom scripts -->
<script src="{{url('admin/js/demo/datatables-demo.js')}}"></script>
<script>
    $(function () {
            $('#jenisdonasi').change(function () {
                $('.optionBox').hide();
                $('#' + $(this).val()).show();
            });
        });

        $(document).ready(function() {
            $('#tableDonasi').DataTable( {
                "order": [[ 5, "asc" ]]
            } );
        } );
</script>
@endpush

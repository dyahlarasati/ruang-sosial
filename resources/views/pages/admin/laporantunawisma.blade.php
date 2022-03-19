@extends('layouts.admin.admin')
@section('title','Laporan Tunawisma')

@push('addon-style')
<!-- Custom styles for this page -->
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="container-fluid">

    <div class="row ml-1 mb-3">
        <a href="{{ route('export-tunawisma-admin') }}" class="btn btn-sm btn-info ml-2 mt-2 shadow-sm">Cetak
            Semua</a>

        <button data-toggle="modal" data-target="#modalCetakTunawisma" class="btn btn-sm shadow-sm btn-warning ml-2 mt-2">Cetak Berdasarkan Panti</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Tunawisma</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="tableTunawisma" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Tunawisma</th>
                            <th>Nama Panti</th>
                            <th>Nama Tunawisma</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Orang Tua</th>
                            <th>Keterangan Keluarga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id_tunawisma }}</td>
                            <td>{{ $item->panti->nama_panti }}</td>
                            <td>{{ $item->nama_tunawisma }}<i class="fas fa-check-circle"></i></td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->nama_orang_tua }}</td>
                            <td>{{ $item->keterangan_keluarga }}
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
<div class="modal fade" id="modalCetakTunawisma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Panti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('print-tunawisma-panti-admin') }}" method="post">
                    @csrf

                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_panti">Pilih Panti</label>
                                <select class="form-control" name="id_panti" id="id_panti">
                                    @foreach ($panti as $item)
                                    <option value="{{ $item->id_panti }}">{{ $item->nama_panti }}
                                    </option>
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
        $('#tableTunawisma').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
@endpush
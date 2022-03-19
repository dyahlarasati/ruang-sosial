@extends('layouts.admin.admin')
@section('title','Data Tunawisma')

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
    @if (session('edit'))
    <div class="alert alert-success" role="alert">
        {{session('edit')}}
    </div>
    @endif
    <!-- Page Heading -->

    <a href="{{route('data-tunawisma.create')}}" class="btn btn-sm btn-primary shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Tunawisma</a>

    <!-- DataTales Example -->
    <div class=" card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tunawisma</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableAkt" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Tunawisma</th>
                            <th>Nama Panti</th>
                            <th>Nama Tunawisma</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Orang Tua</th>
                            <th>Keterangan Keluarga</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id_tunawisma}}</td>
                            <td>{{$item->panti->nama_panti}}</td>
                            <td>{{ $item->nama_tunawisma }}</td>
                            <td>{{$item->tanggal_lahir}}</td>
                            <td>{{$item->nama_orang_tua}}</td>
                            <td>{{$item->keterangan_keluarga}}</td>
                            <td>
                                <a href="{{route('data-tunawisma.edit', $item->id_tunawisma)}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('data-tunawisma.destroy',$item->id_tunawisma)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button name="hapus" id="hapus" class="btn btn-danger btn-sm mt-2"
                                        onclick="return confirm('Apus aja ya?');">Hapus</button>
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

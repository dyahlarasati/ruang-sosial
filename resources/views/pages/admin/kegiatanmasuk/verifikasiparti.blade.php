@extends('layouts.admin.admin')
@section('title','Verifikasi Partisipasi Kegiatan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Verif Modal -->


    <h5>Silahkan lakukan verifikasi</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>ID Partisipasi Kegiatan : <span>{{$item->id_partisipasi_kegiatan}}</span></p>
                    <p>Nama Pembuat Kegiatan : <span>{{$item->user->name}}</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-center mt-5">


        <div class="card">
            <div class="card-body">
                <form action="{{route('verifikasi-particreate', $item->id_partisipasi_kegiatan)}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Silahkan Input Nama yang berpartisipasi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama">
                        @error ('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>




                    <button type="submit" class="btn btn-block btn-success"
                        onclick="return confirm('Apakah anda yakin data sudah benar?');">Submit</button>

                </form>
            </div>
        </div>
    </div>




</div>

<!-- /.container-fluid -->

@endsection


@push('addon-script')
<script>
    $(function () {
            $('#jenisdonasi').change(function () {
                $('.optionBox').hide();
                $('#' + $(this).val()).show();
            });
        });
</script>
@endpush

@extends('layouts.admin.admin')
@section('title','Tambah Aktivitas')



@section('content')

<!-- Begin Page Content -->
<div class="container-fluid ">
    <h3>Tambah Tunawisma</h3>


    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="{{route('data-tunawisma.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="id_panti">Panti</label>
                    <select name="id_panti" required
                        class="form-control @error('id_panti') is-invalid @enderror">
                        <option value="">Pilih Panti</option>
                        @foreach ($panti as $panti)
                        <option value="{{$panti->id_panti}}">Panti :
                            {{$panti->nama_panti}} </option>
                        @endforeach
                    </select>
                    @error ('id_panti')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_tunawisma">Nama Tunawisma</label>
                    <input type="text" name="nama_tunawisma"
                        class="form-control @error('nama_tunawisma') is-invalid @enderror" id="nama_tunawisma"
                        rows="3"></input>
                </div>
                @error ('nama_tunawisma')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" rows="3"></input>
                    </div>
                    @error ('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="nama_orang_tua">Nama Orang Tua</label>
                        <input type="text" name="nama_orang_tua" class="form-control @error('nama_orang_tua') is-invalid @enderror"
                            id="nama_orang_tua" rows="3"></input>
                    </div>
                    @error ('nama_orang_tua')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                   <div class="form-group">
                        <label for="keterangan_keluarga">Keterangan Keluarga</label>
                        <select name="keterangan_keluarga" required class="form-control @error('keterangan_keluarga') is-invalid @enderror">
                            <option value="">Pilih Keterangan</option>
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




                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection

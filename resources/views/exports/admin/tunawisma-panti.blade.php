<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            color: #000;
        }


        table tr th {
            font-size: 15px;
        }

        table tr td {
            font-size: 12px;
        }

        p {
            font-size: 12px;
        }
    </style>

</head>

<body>

    <div>
        {{-- pakai ini kalau di hosting src="./donasi_assets/assets/img/logo.png" --}}
        {{-- <img style="" src="{{ ('admin/img/terang.png') }}" height="auto" width="120"> --}}
        <h2 style="text-align:center; margin-top:-30px">Laporan Data Tunawisma</h2>
    </div>


    <table style="margin-bottom: 10px; margin-top:50px;" cellpadding="5">
        <tbody>
            <tr>
                <th>Nama Panti</th>
                <td>:</td>
                <td>{{ $panti->nama_panti }}</td>
            </tr>
        </tbody>
    </table>

    <table style="text-align: center" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
            <tr>
                <th>ID Tunawisma</th>
                <th>Nama Panti</th>
                <th>Nama Tunawisma</th>
                <th>Tanggal Lahir</th>
                <th>Nama Kepala Keluarga</th>
                <th>Keterangan Keluarga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($info as $i)
            @foreach (App\AdminModel\Tunawisma::with(['panti'])
            ->where('id_tunawisma',$i->id_tunawisma)->withTrashed()->get() as $item)
            <tr>
                <td>{{ $item->id_tunawisma }}</td>
                <td>{{ $item->panti->nama_panti }}</td>
                <td>{{ $item->nama_tunawisma }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->nama_orang_tua }}</td>
                <td>{{ $item->keterangan_keluarga }}</td>
            </tr>
            @endforeach
            @endforeach

        </tbody>
    </table>
    <table style="margin-top: 30px" width="640px">
        <tr>
            <td align="right"><span style="margin-right:-22px">Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span></td>
        </tr>
        <tr>
            <td align="right"><span style="margin-right:45px">Mengetahui,</span></td>
        </tr>
        <tr>
            <td align="right"><span style="margin-right:5px">Admin Ruang Sosial</span></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td align="right"><span style="margin-right:5px;">.................................. </span>
            </td>
        </tr>
    </table>
</body>

</html>

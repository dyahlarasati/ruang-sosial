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
        {{-- <img style="" src="{{ ('admin/img/terang.png') }}" height="auto" width="150" height="120"> --}}
        <h2 style="text-align:center; margin-top:-30px">Laporan Data Donasi</h2>
    </div>


    <table style="text-align: center" border="1" cellspacing="0" cellpadding="8" width="100%">
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
                <td>{{ $item->id_aktivitas_donasi }}</td>
                <td>{{ $item->tempat_donasi->nama_tempat_donasi }}</td>
                <td>{{ $item->tempat_donasi->lokasi_donasi }}</td>
                <td>@currency(\App\Donasi::where('status_verifikasi',
                    true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->sum('nominal'))
                </td>
                <td>{{\App\Donasi::where('status_verifikasi', true)->where('id_aktivitas_donasi',$item->id_aktivitas_donasi)->count()}} Orang
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    <table style="margin-top: 30px" width="640px">
        <tr>
            <td align="right">Jakarta, {{ \Carbon\Carbon::now()->format('d - m - Y') }}</td>
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

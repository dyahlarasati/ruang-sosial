<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\AktivitasDonasi;
use App\AdminModel\TempatDonasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class LapAktivitasDonasiController extends Controller
{
    public function index(Request $request)
    {
        $tempat_donasi = TempatDonasi::withTrashed()->get();
        $items = AktivitasDonasi::with(['tempat_donasi','donasi'])->withTrashed()->get();
        return view('pages.admin.laporanaktivitasdonasi', [
            'tempat_donasi' => $tempat_donasi,
            'items' => $items,
        ]);
    }


    public function export()
    {
        $items = AktivitasDonasi::with(['tempat_donasi','donasi'])->withTrashed()->get();
        $pdf = PDF::loadView('exports.admin.aktivitas-donasi', ['items' => $items]);
        return $pdf->download('Aktivitas-donasi.pdf');
    }

    public function exportPanti(Request $request)
    {
        $tempat_donasi = TempatDonasi::withTrashed()->findOrFail($request->id_tempat_donasi);
        $info = AktivitasDonasi::where('id_tempat_donasi', $request->id_tempat_donasi)->get();

        $pdf = PDF::loadView('exports.admin.aktivitas-donasi-panti', [
            'info' => $info,
            'tempat_donasi' => $tempat_donasi

        ]);
        return $pdf->download('Aktivitas-Donasi-Panti.pdf');
    }
}

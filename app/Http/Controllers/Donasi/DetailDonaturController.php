<?php

namespace App\Http\Controllers\Donasi;

use App\AdminModel\AktivitasDonasi;
use App\Donasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailDonaturController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = AktivitasDonasi::findOrFail($id);
        $donasi = Donasi::with('aktivitasdonasi')->where('status_verifikasi', true)
            ->where('id_aktivitas_donasi', $id)->get();



        return view('pages.home.detaildonatur', [
            'item' => $item,
            'donasi' => $donasi,
        ]);
    }
}

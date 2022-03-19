<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UangMasuk;
use Illuminate\Http\Request;

class DataUangDonasiController extends Controller
{
    public function index()
    {
        $items = UangMasuk::with('donasi.user')->get();
        $total_masuk = UangMasuk::get('nominal')->sum('nominal');
        return view('pages.admin.datauangdonasi', [
            'items' => $items,
            'total_masuk' => $total_masuk
        ]);
    }
}

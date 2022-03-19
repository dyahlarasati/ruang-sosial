<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Panti;
use App\AdminModel\Tunawisma;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class LapTunawismaController extends Controller
{
    public function index(Request $request)
    {
        $panti = Panti::withTrashed()->get();
        $items = Tunawisma::with(['panti'])->withTrashed()->get();


        return view('pages.admin.laporantunawisma', [
            'items' => $items,
            'panti' => $panti,
        ]);
    }

    public function exportTunawisma()
    {
        $items = Tunawisma::with(['panti'])->withTrashed()->get();
        $pdf = PDF::loadView('exports.admin.tunawisma', ['items' => $items]);
        return $pdf->download('Tunawisma.pdf');
    }

    public function exportTunawismaPanti(Request $request)
    {
        $panti = Panti::withTrashed()->findOrFail($request->id_panti);
        $info = Tunawisma::where('id_panti', $request->id_panti)->get();

        $pdf = PDF::loadView('exports.admin.tunawisma-panti', [
            'info' => $info,
            'panti' => $panti

        ]);
        return $pdf->download('Tunawisma-Panti.pdf');
    }
}

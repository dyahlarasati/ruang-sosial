<?php

namespace App\Http\Controllers;

use App\AdminModel\Panti;
use App\AdminModel\Tunawisma;
use Illuminate\Http\Request;

class DetailTunawismaController extends Controller
{
    public function index(Request $request, $id)
    {
         $item = Tunawisma::findOrFail($id);
        $panti = Panti::withTrashed()->findOrFail($request->id_panti);
        // $info = Tunawisma::where('id_panti', $request->id_panti)->get();



        return view('pages.home.detailtunawisma', [
            'item' => $item,
            'panti' => $panti,
        ]);
    }

    public function detail(Request $request)
    {
        $panti = Panti::withTrashed()->findOrFail($request->id_panti);
        $info = Tunawisma::where('id_panti', $request->id_panti)->get();
        return view('pages.home.detail-tunawisma', [
            'panti' => $panti,
            'info' => $info,
        ]);
    }
}

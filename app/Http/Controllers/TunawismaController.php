<?php

namespace App\Http\Controllers;

use App\AdminModel\Panti;
use App\AdminModel\Tunawisma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TunawismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $panti = Panti::all();
        // $panti = Panti::withTrashed()->findOrFail($request->id_panti);
        // $panti = Panti::withTrashed()->findOrFail($request->id_panti);


        $panti = Panti::withTrashed()->get();
        $items = Tunawisma::with(['panti'])->withTrashed()->get();

        return view('pages.home.tunawisma', [
            'panti' => $panti,
            'items' => $items,
        ]);
    }

    public function detailTunawisma(Request $request)
    {

        $panti = Panti::withTrashed()->findOrFail($request->id_panti);
        $info = Tunawisma::where('id_panti', $request->id_panti)->get();
        return view('pages.home.detailtunawisma', [
            'panti' => $panti,
            'info' => $info,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminModel\TempatDonasi  $tempatDonasi
     * @return \Illuminate\Http\Response
     */
    public function gettunawisma(Request $request)
    {
        // $items = Tunawisma::with('panti')->withTrashed()->where('tunawisma');
        $info = Panti::withTrashed()->findOrFail($request->id_panti);
        // $items = Tunawisma::with('panti')->where('id_panti', $request->id_panti)->orderBy('nama_tunawisma', 'asc')->get();
        // $info = Tunawisma::where('id_panti', $request->id_panti)->get();
        // $info = Tunawisma::withTrashed()->get();
        return view('pages.home.info-tunawisma', ['info' => $info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminModel\TempatDonasi  $tempatDonasi
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminModel\TempatDonasi  $tempatDonasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminModel\TempatDonasi  $tempatDonasi
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}

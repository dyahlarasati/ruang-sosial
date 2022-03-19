<?php

namespace App\Http\Controllers\Admin;

use App\Donasi;
use App\Http\Controllers\Controller;
use App\UangMasuk;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class DonasiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $item = Donasi::with(['user'])->get();
        $total_masuk = Donasi::get('nominal')->sum('nominal');
        return view('pages.admin.donasimasuk.index', [
            'items' => $item,
            'total_masuk' => $total_masuk
        ]);
    }

    public function verifikasiuang(Request $request, $id)
    {
        $item = Donasi::with(['user'])->findOrFail($id);
        return view('pages.admin.donasimasuk.verifikasiuang', [
            'item' => $item
        ]);
    }

    public function verifikasiuangcreate(Request $request, $iddm)
    {
        $request->validate([
            'nominal' => ['required', 'integer'],
        ], [
            'nominal.required' => 'Tidak boleh kosong',
            'nominal.integer' => 'Harus angka'
        ]);

        $donasi = Donasi::findOrFail($iddm);
        $donasi->status_verifikasi = true;
        $donasi->save();

        $config = [
            'table' => 'uang_masuk', 'field' => 'id_uang_masuk', 'length' => 15, 'prefix' => 'UANG-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id = IdGenerator::generate($config);



        $data = $request->all();
        $data['id_uang_masuk'] = $id . $donasi->user_id;
        $data['id_donasi'] = $iddm;
        $data['tanggal_masuk'] = Carbon::now();

        UangMasuk::create($data);
        return redirect()->route('donasi-masuk')->with('sukses', 'Verifikasi Berhasil');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

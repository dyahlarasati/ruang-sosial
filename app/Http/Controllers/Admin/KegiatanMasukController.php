<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KegiatanMasuk;
use App\PartisipasiKegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KegiatanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PartisipasiKegiatan::with(['user'])->get();
        return view('pages.admin.kegiatanmasuk.index', [
            'items' => $items
        ]);
    }


    public function verifikasiparti(Request $request, $id)
    {
        $item = PartisipasiKegiatan::with(['user'])->findOrFail($id);
        return view('pages.admin.kegiatanmasuk.verifikasiparti', [
            'item' => $item
        ]);
    }



    public function verifikasiparticreate(Request $request, $idpt)
    {
        $request->validate([
            'nama' => ['required'],
        ], [
            'nama.required' => 'Tidak boleh kosong',
        ]);

        $parti = PartisipasiKegiatan::findOrFail($idpt);
        $parti->status_verifikasi = true;
        $parti->save();

        $config = [
            'table' => 'kegiatan_masuk', 'field' => 'id_kegiatan_masuk', 'length' => 15, 'prefix' => 'KGTM-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id = IdGenerator::generate($config);



        $data = $request->all();
        $data['id_kegiatan_masuk'] = $id . $parti->user_id;
        $data['id_partisipasi_kegiatan'] = $idpt;
        $data['tanggal_kegiatan_masuk'] = Carbon::now();

        KegiatanMasuk::create($data);
        return redirect()->route('kegiatan-masuk')->with('sukses', 'Verifikasi Berhasil');
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

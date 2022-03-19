<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\AktivitasDonasi;
use App\AdminModel\TempatDonasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataAktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = AktivitasDonasi::with(['tempat_donasi'])->get();

        return view('pages.admin.dataaktivitasdonasi.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tempat_donasi = TempatDonasi::all();
        return view('pages.admin.dataaktivitasdonasi.create', ['tempat_donasi' => $tempat_donasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'id_tempat_donasi' => ['required', 'exists:tempat_donasi,id_tempat_donasi', 'unique:aktivitas_donasi,id_tempat_donasi'],
            'foto_aktivitas' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5000'],
            'kontak_koordinator' => ['required', 'max:255', 'string'],
            'kontak_koordinator' => ['numeric'],
        ], [
            'id_tempat_donasi.unique' => 'Aktivitas ini sudah pernah dibuat',
            'foto_aktivitas.image' => 'Yang anda masukkan bukan gambar',
            'foto_aktivitas.mimes' => 'Format harus jpeg/png/jpeg',
            'kontak_koordinator.required' => 'Keterangan harus diisi',
            'kontak_koordinator.numeric' => 'Harus Berupa angka !',
        ]);

        $config = [
            'table' => 'aktivitas_donasi', 'field' => 'id_aktivitas_donasi', 'length' => 13, 'prefix' => 'AKTD-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id = IdGenerator::generate($config);

        $data = $request->all();
        $data['id_aktivitas_donasi'] = $id;
        $data['foto_aktivitas'] = $request->file('foto_aktivitas')->store(
            'assets/gallery',
            'public'
        );

        AktivitasDonasi::create($data);
        return redirect()->route('data-aktivitas.index')->with('sukses', 'Data Berhasil Ditambahkan');
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
        $item = AktivitasDonasi::findOrFail($id);
        return view('pages.admin.dataaktivitasdonasi.edit', [
            'item' => $item
        ]);
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
        $request->validate([

            'foto_aktivitas' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5000'],
            'kontak_koordinator' => ['required', 'max:255', 'string'],
        ], [
            'foto_aktivitas.image' => 'Yang anda masukkan bukan gambar',
            'foto_aktivitas.mimes' => 'Format harus jpeg/png/jpeg',
            'kontak_koordinator.required' => 'Keterangan harus diisi',
            'kontak_koordinator.numeric' => 'Harus Berupa angka !',
        ]);

        $data = $request->all();
        $data['foto_aktivitas'] = $request->file('foto_aktivitas')->store(
            'assets/gallery',
            'public'
        );
        $item = AktivitasDonasi::findOrFail($id);

        $item->update($data);
        return redirect()->route('data-aktivitas.index')->with('edit', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AktivitasDonasi::findOrFail($id);
        $item->delete();
        return redirect()->route('data-aktivitas.index')->with('dihapus', 'Data Berhasil Dihapus');
    }
}

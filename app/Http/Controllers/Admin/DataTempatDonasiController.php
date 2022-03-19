<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\TempatDonasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataTempatDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TempatDonasi::all();
        return view('pages.admin.datatempatdonasi.index', ['items' => $items]);
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
        $request->validate([
            'nama_tempat_donasi' => ['required', 'string', 'max:255'],
            'lokasi_donasi' => ['required', 'string', 'max:255']
        ]);

        $config = [
            'table' => 'tempat_donasi', 'field' => 'id_tempat_donasi', 'length' => 4, 'prefix' => 'T'
        ];
        $id = IdGenerator::generate($config);
        $data = $request->all();
        $data['id_tempat_donasi'] = $id;
        TempatDonasi::create($data);

        return redirect()->route('data-tempat-donasi.index')->with('sukses', 'Data Berhasil Ditambahkan');
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
        $item = TempatDonasi::findOrFail($id);
        $item->delete();
        return redirect()->route('data-tempat-donasi.index')->with('dihapus', 'Data Berhasil Dihapus');
    }
}

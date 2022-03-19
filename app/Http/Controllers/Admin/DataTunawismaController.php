<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Panti;
use App\AdminModel\Tunawisma;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataTunawismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Tunawisma::with(['panti'])->get();


        return view('pages.admin.datatunawisma.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $panti = Panti::all();
        return view('pages.admin.datatunawisma.create', ['panti' => $panti]);
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
            'id_panti' => ['required'],
            'nama_tunawisma' => ['required'],
            'tanggal_lahir' => ['required'],
            'nama_orang_tua' => ['required'],
            'keterangan_keluarga' => ['required'],
        ], [
            'id_panti.required' => 'Panti harus dipilih',
            'nama_tunawisma.required' => 'Nama Tunawisma harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'nama_orang_tua.required' => 'Nama Orang Tua harus diisi',
            'keterangan_keluarga.required' => 'Keterangan Keluarga harus dipilih',
        ]);

        $config = [
            'table' => 'tunawisma', 'field' => 'id_tunawisma', 'length' => 13, 'prefix' => 'TWSM-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id = IdGenerator::generate($config);

        $data = $request->all();
        $data['id_tunawisma'] = $id;

        Tunawisma::create($data);
        return redirect()->route('data-tunawisma.index')->with('sukses', 'Data Berhasil Ditambahkan');
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
        $item = Tunawisma::findOrFail($id);
        return view('pages.admin.datatunawisma.edit', [
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

            'nama_tunawisma' => ['required'],
            'tanggal_lahir' => ['required'],
            'nama_orang_tua' => ['required'],
            'keterangan_keluarga' => ['required'],
        ], [

            'nama_tunawisma.required' => 'Nama Tunawisma harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'nama_orang_tua.required' => 'Nama Orang Tua harus diisi',
            'keterangan_keluarga.required' => 'Keterangan Keluarga harus dipilih',
        ]);

        $data = $request->all();

        $item = Tunawisma::findOrFail($id);

        $item->update($data);
        return redirect()->route('data-tunawisma.index')->with('edit', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tunawisma::findOrFail($id);
        $item->delete();
        return redirect()->route('data-tunawisma.index')->with('dihapus', 'Data Berhasil Dihapus');
    }
}

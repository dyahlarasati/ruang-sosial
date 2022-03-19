<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\TempatKegiatan;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kegiatan::with(['tempat_kegiatan'])->get();

        return view('pages.admin.datakegiatan.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tempat_kegiatan = TempatKegiatan::all();
        return view('pages.admin.datakegiatan.create', ['tempat_kegiatan' => $tempat_kegiatan]);
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
            'id_tempat_kegiatan' => ['required', 'exists:tempat_kegiatan,id_tempat_kegiatan', 'unique:kegiatan,id_tempat_kegiatan'],
            'nama_kegiatan' => ['required'],
            'tanggal_kegiatan' => ['required'],
            'waktu_kegiatan' => ['required'],
            'foto_kegiatan' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5000'],
        ], [
            'id_tempat_kegiatan.unique' => 'Aktivitas ini sudah pernah dibuat',
            'nama_kegiatan.required' => 'Nama Kegiatan wajib di isi',
            'tanggal_kegiatan.required' => 'Tanggal Kegiatan wajib di isi',
            'waktu_kegiatan.required' => 'Waktu Kegiatan wajib di isi',
            'foto_kegiatan.image' => 'Yang anda masukkan bukan gambar',
            'foto_kegiatan.mimes' => 'Format harus jpeg/png/jpeg',
        ]);

        $config = [
            'table' => 'kegiatan', 'field' => 'id_kegiatan', 'length' => 13, 'prefix' => 'KGTN-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id = IdGenerator::generate($config);

        $data = $request->all();
        $data['id_kegiatan'] = $id;
        $data['foto_kegiatan'] = $request->file('foto_kegiatan')->store(
            'assets/fotokegiatan',
            'public'
        );

        Kegiatan::create($data);
        return redirect()->route('data-kegiatan.index')->with('sukses', 'Data Berhasil Ditambahkan');
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
        $item = Kegiatan::findOrFail($id);
        return view('pages.admin.datakegiatan.edit', [
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

            'foto_kegiatan' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5000'],
            'nama_kegiatan' => ['required', 'max:255', 'string'],
            'tanggal_kegiatan' => ['required'],
            'waktu_kegiatan' => ['required'],
        ], [
            'foto_kegiatan.image' => 'Yang anda masukkan bukan gambar',
            'foto_kegiatan.mimes' => 'Format harus jpeg/png/jpeg',
            'nama_kegiatan.required' => 'Nama Kegiatan harus diisi',
            'tanggal_kegiatan.required' => 'Tanggal Kegiatan harus diisi',
            'waktu_kegiatan.required' => 'Waktu Kegiatan harus diisi',
        ]);
        $item = Kegiatan::findOrFail($id);
        $data = $request->all();
        $data['foto_kegiatan'] = $request->file('foto_kegiatan')->store(
            'assets/gallery',
            'public'
        );
        if ($request->hasFile('data')) {
            unlink(storage_path('app/public/assets/gallery/' . $data->hashName()));
        }


        $item->update($data);
        return redirect()->route('data-kegiatan.index')->with('edit', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kegiatan::findOrFail($id);
        $item->delete();
        return redirect()->route('data-kegiatan.index')->with('dihapus', 'Data Berhasil Dihapus');
    }
}

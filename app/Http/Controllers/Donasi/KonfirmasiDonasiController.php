<?php

namespace App\Http\Controllers\Donasi;

use App\AdminModel\AktivitasDonasi;
use App\AdminModel\TempatDonasi;
use App\Donasi;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class KonfirmasiDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_aktivitas = AktivitasDonasi::findOrFail($id);

        $config = [
            'table' => 'donasi', 'field' => 'id_donasi', 'length' => 15, 'prefix' => 'DNS-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id_donasi = IdGenerator::generate($config);
        $id = $id_donasi . Auth::user()->user_id;

        $item = Auth::user();
        return view('pages.home.konfirmasi-donasi', [
            'item' => $item,
            'id' => $id,
            'id_aktivitas' => $id_aktivitas,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $request->validate([
            'nominal' => ['required'],
            'foto_bukti' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2000']
        ], [
            'foto_bukti.image' => 'Yang anda masukkan bukan gambar',
            'foto_bukti.mimes' => 'Format harus jpg/png/jpeg',
        ]);

        $nama;
        if ($request->nama_donatur_noname != null) {
            $nama = 'Noname';
        } else {
            $nama = $request->nama_donatur;
        }


        Donasi::create([
            'id_donasi' => $request->id_donasi,
            'id_aktivitas_donasi' => $id,
            'user_id' => Auth::user()->user_id,
            'nama_donatur' => $nama,
            'status_verifikasi' => false,
            'nominal' => $request->nominal,
            'foto_bukti' => $request->file('foto_bukti')->store(
                'assets/gallery',
                'public'
            ),
            'tanggal_donasi' => Carbon::now()
        ]);

        return  redirect()->route('sukses-donasi', $id);
    }

    public function suksesDonasi()
    {
        return view('pages.home.sukses-donasi');
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

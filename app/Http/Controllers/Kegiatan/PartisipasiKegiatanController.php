<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\PartisipasiKegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class PartisipasiKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_kegiatan = Kegiatan::findOrFail($id);

        $config = [
            'table' => 'partisipasi_kegiatan', 'field' => 'id_partisipasi_kegiatan', 'length' => 15, 'prefix' => 'PTSK-' . date('ym'),
            'reset_on_prefix_change' => true
        ];
        $id_partisipasi_kegiatan = IdGenerator::generate($config);
        $id = $id_partisipasi_kegiatan . Auth::user()->user_id;

        $item = Auth::user();
        return view('pages.kegiatan.partisipasi-kegiatan', [
            'item' => $item,
            'id' => $id,
            'id_kegiatan' => $id_kegiatan,

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
            'alasan' => ['required'],
            // 'lokasi_kegiatan' => ['required'],
            // 'tanggal_kegiatan_berlangsung' => ['required'],
            // 'waktu_kegiatan' => ['required'],
            'bukti_pengajuan' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2000']
        ], [
            'bukti_pengajuan.required' => 'Bukti Pengajuan Kegiatan harus diisi',
            'bukti_pengajuan.image' => 'Yang anda masukan bukan Foto',
            'bukti_pengajuan.mimes' => 'Format harus jpg,png dan jpeg',
            'alasan.required' => 'Alasan Kegiatan harus diisi',
            // 'lokasi_kegiatan.required' => 'Lokasi Kegiatan harus diisi',
            // 'waktu_kegiatan.required' => 'Waktu Kegiatan harus diisi',
            // 'tanggal_kegiatan_berlangsung.required' => 'Tanggal Kegiatan Berlangsung harus diisi',
        ]);
        $nama = $request->nama;
        PartisipasiKegiatan::create([
            'id_partisipasi_kegiatan' => $request->id_partisipasi_kegiatan,
            'id_kegiatan' => $id,
            'user_id' => Auth::user()->user_id,
            'nama' => $nama,
            'status_verifikasi' => false,
            'alasan' => $request->alasan,
            // 'lokasi_kegiatan' => $request->lokasi_kegiatan,
            // 'waktu_kegiatan' => $request->waktu_kegiatan,
            // 'tanggal_kegiatan_berlangsung' => $request->tanggal_kegiatan_berlangsung,
            'bukti_pengajuan' => $request->file('bukti_pengajuan')->store(
                'assets/identitas',
                'public'
            ),
            'tanggal_partisipasi' => Carbon::now()
        ]);

        return  redirect()->route('sukses-partisipasi', $id);
    }

    public function suksesPartisipasi()
    {
        return view('pages.kegiatan.sukses-partisipasi');
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

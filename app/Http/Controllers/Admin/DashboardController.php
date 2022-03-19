<?php

namespace App\Http\Controllers\Admin;

use App\Donasi;
use App\Http\Controllers\Controller;
use App\PartisipasiKegiatan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date_donasi = Carbon::now()->format('Y-m-d');
        $year_donasi= Carbon::now()->format('Y');

        $donasi = Donasi::where('tanggal_donasi', $date_donasi)->where('status_verifikasi', true)->count();
        $user = User::where('role', 'DONATUR')->count();
        $request_donasi = Donasi::where('status_verifikasi', 'PENDING')->count();
        $request_kegiatan = PartisipasiKegiatan::where('status_verifikasi', 'PENDING')->count();
         $data =[];
        for($i = 1; $i < 13; $i++){
            $data[]= Donasi::whereMonth('tanggal_donasi',$i)->whereYear('tanggal_donasi',$year_donasi)->count();
        }

        return view('pages.admin.dashboard', [
            'user' => $user,
            'donasi' => $donasi,
            'data' => $data,
            'request_donasi' => $request_donasi,
            'request_kegiatan' => $request_kegiatan]);
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

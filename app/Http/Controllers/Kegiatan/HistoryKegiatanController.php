<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\PartisipasiKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryKegiatanController extends Controller
{
    public function index(Request $request)
    {

        $items = PartisipasiKegiatan::where('user_id', Auth::user()->user_id)->get();
        return view('pages.kegiatan.history-kegiatan', [
            'items' => $items
        ]);
    }
}

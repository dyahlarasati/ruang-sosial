<?php

namespace App\Http\Controllers\Donasi;

use App\Donasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryDonasiController extends Controller
{
    public function index(Request $request)
    {

        $items = Donasi::where('user_id', Auth::user()->user_id)->get();
        return view('pages.home.history-donasi', [
            'items' => $items
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KK;
use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;

class DataKkController extends Controller
{
    public function index()
    {
        $RT = RT::get();
        $KK = KK::get();
        $K = Keluarga::get();

        return view('kk_view', [
            'RT' => $RT,
            'KK' => $KK,
            'K' => $K,
        ]);
    }
}

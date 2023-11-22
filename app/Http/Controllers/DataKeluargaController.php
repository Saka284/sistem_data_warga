<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class DataKeluargaController extends Controller
{
    public function index()
    {
        $K = Keluarga::get();
        return view('keluarga', ['K' => $K]);
    }
}

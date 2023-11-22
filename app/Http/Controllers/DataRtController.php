<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;

class DataRtController extends Controller
{
    public function index()
    {
        $RT = RT::get();
        return view('rt_view', ['RT' => $RT]);
    }
}

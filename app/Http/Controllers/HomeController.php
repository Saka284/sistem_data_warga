<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;
use App\Models\KK;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $RT = RT::get();
        $KK = KK::get();
        $K = Keluarga::get();

        return view('home', [
            'RT' => $RT,
            'KK' => $KK,
            'K' => $K,
        ]);

        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }
}

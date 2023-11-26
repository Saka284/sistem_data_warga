<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;
use App\Models\KK;
use App\Models\Pengumuman;

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

        $users = User::count();

        $widget = [
            'users' => $users,
            //... other widget data
        ];

        $pengumumans = Pengumuman::latest()->take(1)->get(); // Get the latest announcement

        return view('home', compact('RT', 'KK', 'K', 'widget', 'pengumumans'));
    }

    public function showHomePage()
    {
        $pengumumans = Pengumuman::latest()->take(1)->get(); // Get the latest announcement

        return view('home', compact('pengumumans'));
    }

    public function showPengumumanDetail($id)
    {

        $pengumumans = Pengumuman::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_pengumuman', compact('pengumumans'));
    }
}

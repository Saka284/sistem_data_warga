<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;
use App\Models\KK;
use App\Models\Pengumuman;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RTExport;
use App\Exports\KKExport;
use App\Exports\KExport;

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

        $pengumumans = Pengumuman::get(); // Get the latest announcement

        return view('home', compact('RT', 'KK', 'K', 'widget', 'pengumumans'));
    }

    public function showHomePage()
    {
        $pengumumans = Pengumuman::latest()->get(); // Get all announcements, ordered by the latest first

        return view('home', compact('pengumumans'));
    }


    public function showPengumumanDetail($id)
    {

        $pengumumans = Pengumuman::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_pengumuman', compact('pengumumans'));
    }

    public function exportRT()
    {
        return Excel::download(new RTExport, 'rt_data.xlsx');
    }

    public function exportKK()
    {
        return Excel::download(new KKExport, 'kk_data.xlsx');
    }

    public function exportK()
    {
        return Excel::download(new KExport, 'k_data.xlsx');
    }
}

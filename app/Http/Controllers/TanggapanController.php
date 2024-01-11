<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanController extends Controller
{
    public function store(Request $request)
    {
        DB::table('pengaduans')->where('id', $request->pengaduan_id)->update([
            'status' => $request->status,
        ]);

        $petugas_id = Auth::user()->id;

        $data = $request->all();

        $data['pengaduan_id'] = $request->pengaduan_id;
        $data['petugas_id'] = $petugas_id;

        Tanggapan::create($data);
        return redirect()->route('pengaduan_detail', ['id' => $request->pengaduan_id])->with('success', 'Tanggapan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        return view('tanggapan_tambah', [
            'item' => $item
        ]);
    }
}

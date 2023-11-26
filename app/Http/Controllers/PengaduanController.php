<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function adminIndex()
    {
        // Tampilkan semua pengaduan
        $pengaduan = Pengaduan::all();
        return view('pengaduan_admin_view', compact('pengaduan'));
    }
    function index()
    {
        // Tampilkan pengaduan yang dimiliki oleh pengguna saat ini
        $pengaduan = Pengaduan::where('user_id', auth()->id())->get();

        return view('pengaduan_view', compact('pengaduan'));
    }

    public function create()
    {
        return view('buat_pengaduan');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomer_telp' => 'required', // Tambahkan validasi untuk nomor telepon
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan pengaduan
        $imagePath = $request->file('image')->store('pengaduan');
        Pengaduan::create([
            'name' => auth()->user()->name,
            'user_id' => auth()->id(),
            'nomer_telp' => $request->nomer_telp, // Simpan nomor telepon
            'description' => $request->description,
            'image' => $imagePath,
            'status' => 'Belum di Proses',
        ]);

        return redirect()->route('pengaduan')->with('success', 'Pengaduan berhasil disimpan!');
    }

    function hapusPengaduan($id)
    {
        $data = Pengaduan::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }

    // Controller
    public function showPengaduanDetail($id)
    {
        $pengaduan = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        $tangap = Tanggapan::where('pengaduan_id', $id)->first();

        return view('detail.detail_aduan', [
            'pengaduan' => $pengaduan,
            'tangap' => $tangap
        ]);
    }
}

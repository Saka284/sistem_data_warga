<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::all();
        return view('pengumuman', compact('pengumumans'));
    }

    public function tambahPengumuman(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'tgl_pengumuman' => 'required|date:m-d-Y',
        ]);

        // Ambil data dari request
        $judul_pengumuman = $request->input('judul_pengumuman');
        $isi_pengumuman = $request->input('isi_pengumuman');
        $tgl_pengumuman = $request->input('tgl_pengumuman');

        // Buat pengumuman baru
        $pengumuman = Pengumuman::create([
            'judul_pengumuman' => $judul_pengumuman,
            'isi_pengumuman' => $isi_pengumuman,
            'tgl_pengumuman' => $tgl_pengumuman,
        ]);


        // Berikan respons berdasarkan hasil operasi
        if ($pengumuman) {
            return back()->with('success', 'Pengumuman berhasil ditambahkan!');
        } else {
            return back()->withErrors(['error' => 'Error: Gagal menambahkan pengumuman.']);
        }
    }

    function getDataPengumuman(Request $request)
    {
        $id = $request->post('id');
        $this->validate($request, [
            'id' => 'required|integer'
        ]);

        $data = Pengumuman::where('id', $id)->get();

        return $data;
    }

    public function editDataPengumuman(Request $request)
    {
        $this->validate($request, [
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'tgl_pengumuman' => 'required|date',
            'data-id' => 'required|integer',
        ]);

        $judul_pengumuman = $request->input('judul_pengumuman');
        $isi_pengumuman = $request->input('isi_pengumuman');
        $tgl_pengumuman = $request->input('tgl_pengumuman');
        $id = $request->input('data-id');

        $data = Pengumuman::where('id', $id)->update([
            'judul_pengumuman' => $judul_pengumuman,
            'isi_pengumuman' => $isi_pengumuman,
            'tgl_pengumuman' => $tgl_pengumuman,
        ]);

        if ($data) {
            return back()->with('success', 'Pengumuman berhasil diupdate');
        } else {
            return back()->withErrors(['error' => 'Error ketika update data di database!']);
        }
    }

    function hapusPengumuman($id)
    {
        $data = Pengumuman::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }

    public function showHomePage()
    {
        $pengumumans = Pengumuman::latest()->get();

        return view('home', compact('pengumumans'));
    }

    public function showPengumumanDetail($id)
    {

        $pengumumans = Pengumuman::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_pengumuman', compact('pengumumans'));
    }
}

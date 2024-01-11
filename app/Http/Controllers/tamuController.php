<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;

class tamuController extends Controller
{
    function index()
    {
        $tamu = Tamu::get();
        return view('tamu', [
            'tamu' => $tamu,
        ]);
    }

    function tambahTamu(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'nomer_telp' => 'required',
            'tanggal' => 'required|date:m-d-Y',
            'tujuan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('tamu', 'public');

        // Set the default status to "Masuk"
        $status = $request->input('status', 'Masuk');

        $data = Tamu::create([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'nomer_telp' => $request->input('nomer_telp'),
            'tanggal' => $request->input('tanggal'),
            'tujuan' => $request->input('tujuan'),
            'image' => $imagePath,
            'status' => $status,
        ]);


        if ($data) {
            return back()->with('success', 'Data berhasil ditambahkan!');
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }

    function hapusTamu($id)
    {
        $data = Tamu::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }

    public function showTamuDetail($id)
    {

        $tamu = Tamu::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_tamu', compact('tamu'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $tamu = Tamu::findOrFail($id);

            // Check if the status is already 'Keluar'
            if ($tamu->status == 'Keluar') {
                return back()->withErrors(['error' => 'Status Tamu sudah Keluar dan tidak dapat diupdate lagi.']);
            }

            // Update the status from "Masuk" to "Keluar" or vice versa
            $tamu->status = ($tamu->status == 'Masuk') ? 'Keluar' : 'Masuk';
            $tamu->save();

            return back()->with('success', 'Status Tamu berhasil diupdate.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}

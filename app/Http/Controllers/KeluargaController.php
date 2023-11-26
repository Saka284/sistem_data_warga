<?php

namespace App\Http\Controllers;

use App\Models\KK;
use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;

class KeluargaController extends Controller
{
    public function index()
    {
        $RT = RT::get();
        $KK = KK::get();
        $K = Keluarga::get();

        return view('data_warga.keluarga_view', [
            'RT' => $RT,
            'KK' => $KK,
            'K' => $K,
        ]);
    }

    function tambahKeluarga(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'no_nik' => 'required|integer',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'kepala_keluarga_id' => 'required|integer'
        ]);

        $nama_lengkap = $request->input('nama_lengkap');
        $kepala_keluarga_id = $request->input('kepala_keluarga_id');
        $no_nik = $request->input('no_nik');
        $ttl = $request->input('ttl');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $golongan_darah = $request->input('golongan_darah');
        $agama = $request->input('agama');
        $status_perkawinan = $request->input('status_perkawinan');
        $pekerjaan = $request->input('pekerjaan');
        $kewarganegaraan = $request->input('kewarganegaraan');

        $data = Keluarga::insert([
            'nama_lengkap' => $nama_lengkap,
            'no_nik' => $no_nik,
            'ttl' => $ttl,
            'jenis_kelamin' => $jenis_kelamin,
            'golongan_darah' => $golongan_darah,
            'agama' => $agama,
            'status_perkawinan' => $status_perkawinan,
            'pekerjaan' => $pekerjaan,
            'kewarganegaraan' => $kewarganegaraan,
            'kepala_keluarga_id' => $kepala_keluarga_id,
            'created_at' => now()
        ]);

        if ($data) {
            return back()->with('success', 'Data berhasil ditambahkan!');
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }

    function getDataK(Request $request)
    {
        $id = $request->post('id');
        $this->validate($request, [
            'id' => 'required|integer'
        ]);

        $data = Keluarga::where('id', $id)->get();

        return $data;
    }

    function editDataKeluarga(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'no_nik' => 'required|integer',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'kepala_keluarga_id' => 'required|integer',
            'id' => 'required|integer'
        ]);
        $id = $request->input('id');
        $data = Keluarga::where('id', $id)->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'no_nik' => $request->input('no_nik'),
            'ttl' => $request->input('ttl'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'golongan_darah' => $request->input('golongan_darah'),
            'agama' => $request->input('agama'),
            'status_perkawinan' => $request->input('status_perkawinan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'kepala_keluarga_id' => $request->input('kepala_keluarga_id')
        ]);

        if ($data) {
            return back()->with('success', 'Data berhasil diedit!');
        } else {
            return back()->withErrors(['errors' => 'Ada masalah ketika mengupdate data!']);
        }
    }


    function hapusK($id)
    {
        $data = Keluarga::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }

    public function showKeluargaDetail($id)
    {

        $k = Keluarga::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_keluarga', compact('k'));
    }
}

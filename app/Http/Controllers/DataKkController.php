<?php

namespace App\Http\Controllers;

use App\Models\KK;
use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;

class DataKkController extends Controller
{
    public function index()
    {
        $RT = RT::get();
        $KK = KK::get();
        $K = Keluarga::get();

        return view('data_warga.kk_view', [
            'RT' => $RT,
            'KK' => $KK,
            'K' => $K,
        ]);
    }

    public function showKkDetail($id)
    {

        $kk = KK::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_kk', compact('kk'));
    }


    //FUNCTION TAMBAH DATA KEPALA KELUARGA
    function tambahKk(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'no_nik' => 'required|integer',
            'no_kk' => 'required|integer',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'rt_id' => 'required|integer',
        ]);

        $nama_lengkap = $request->input('nama_lengkap');
        $rt_id = $request->input('rt_id');
        $no_rt = $request->input('no_rt');
        $no_nik = $request->input('no_nik');
        $no_kk = $request->input('no_kk');
        $ttl = $request->input('ttl');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $golongan_darah = $request->input('golongan_darah');
        $alamat = $request->input('alamat');
        $agama = $request->input('agama');
        $status_perkawinan = $request->input('status_perkawinan');
        $pekerjaan = $request->input('pekerjaan');
        $kewarganegaraan = $request->input('kewarganegaraan');

        $data = KK::create([
            'nama_lengkap' => $nama_lengkap,
            'no_nik' => $no_nik,
            'no_kk' => $no_kk,
            'ttl' => $ttl,
            'jenis_kelamin' => $jenis_kelamin,
            'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'agama' => $agama,
            'status_perkawinan' => $status_perkawinan,
            'pekerjaan' => $pekerjaan,
            'kewarganegaraan' => $kewarganegaraan,
            'rt_id' => $rt_id,
            'created_at' => now()
        ]);

        if ($data) {
            return back()->with('success', 'Data berhasil ditambahkan!');
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }

    //fetch data kepala keluarga
    function getDataKk(Request $request)
    {
        $id = $request->post('id');
        $this->validate($request, [
            'id' => 'required|integer'
        ]);

        $data = KK::where('id', $id)->get();

        return $data;
    }

    function editDataKk(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'no_nik' => 'required|integer',
            'no_kk' => 'required|integer',
            'no_rt' => 'required|integer',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'data-id' => 'required|integer'
        ]);

        $nama_lengkap = $request->input('nama_lengkap');
        $no_nik = $request->input('no_nik');
        $no_kk = $request->input('no_kk');
        $no_rt = $request->input('no_rt');
        $ttl = $request->input('ttl');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $golongan_darah = $request->input('golongan_darah');
        $alamat = $request->input('alamat');
        $agama = $request->input('agama');
        $status_perkawinan = $request->input('status_perkawinan');
        $pekerjaan = $request->input('pekerjaan');
        $kewarganegaraan = $request->input('kewarganegaraan');
        $id = $request->input('data-id');

        $data = KK::where('id', $id)->update([
            'nama_lengkap' => $nama_lengkap,
            'no_nik' => $no_nik,
            'no_kk' => $no_kk,
            'rt_id' => $no_rt,
            'ttl' => $ttl,
            'jenis_kelamin' => $jenis_kelamin,
            'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'agama' => $agama,
            'status_perkawinan' => $status_perkawinan,
            'pekerjaan' => $pekerjaan,
            'kewarganegaraan' => $kewarganegaraan,
        ]);

        if ($data) {
            return back()->with('success', 'Data berhasil diupdate');
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }

    function hapusKk($id)
    {
        $data = KK::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }
}

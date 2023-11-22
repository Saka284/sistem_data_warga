<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Keluarga;
use App\Models\KK;

class DataRtController extends Controller
{
    public function index()
    {
        $RT = RT::get();
        $KK = KK::get();
        $K = Keluarga::get();

        return view('rt_view', [
            'RT' => $RT,
            'KK' => $KK,
            'K' => $K,
        ]);
    }

    function tambahRt(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'no_rt' => 'required|integer',
            'no_nik' => 'required|integer',
            'no_kk' => 'required|integer',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
        ]);

        $nama_lengkap = $request->input('nama_lengkap');
        $no_rt = $request->input('no_rt');
        $no_nik = $request->input('no_nik');
        $no_kk = $request->input('no_kk');
        $ttl = $request->input('ttl');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $golongan_darah = $request->input('golongan_darah');
        $alamat = $request->input('alamat');
        $agama = $request->input('agama');
        $status_perkawinan = $request->input('status_perkawinan');

        $data = RT::create([
            'nama_lengkap' => $nama_lengkap,
            'no_rt' => $no_rt,
            'no_nik' => $no_nik,
            'no_kk' => $no_kk,
            'ttl' => $ttl,
            'jenis_kelamin' => $jenis_kelamin,
            'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'agama' => $agama,
            'status_perkawinan' => $status_perkawinan,
            'created_at' => now()
        ]);

        if ($data) {
            return back();
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }
}

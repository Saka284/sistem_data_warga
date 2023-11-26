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

        return view('data_warga.rt_view', [
            'RT' => $RT,
            'KK' => $KK,
            'K' => $K,
        ]);
    }

    function tambahRt(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'no_rt' => 'required|integer|unique:rt',
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
            return back()->with('success', 'Data berhasil ditambahkan!');
        } else {
            return back()->withErrors(['error' => 'Error: No RT sudah ada!']);
        }
    }

    //fetch data rt
    function getDataRt(Request $request)
    {
        $id = $request->post('id');
        $this->validate($request, [
            'id' => 'required|integer'
        ]);

        $data = RT::where('id', $id)->get();

        return $data;
    }


    //edit data rt 
    function editDataRt(Request $request)
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
            'data-id' => 'required|integer',
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
        $id = $request->input('data-id');

        $data = RT::where('id', $id)->update([
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
        ]);

        if ($data) {
            return back()->with('success', 'Data updated successfully.');
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }

    function hapusRt($id)
    {
        $data = RT::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }

    public function showRtDetail($id)
    {

        $rt = RT::find($id);

        // Return the RT detail view with the RT data
        return view('detail.detail_rt', compact('rt'));
    }
}

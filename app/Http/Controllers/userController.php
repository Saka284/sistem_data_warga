<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    function index()
    {
        $user = User::get();
        return view('dataAkun', [
            'user' => $user,
        ]);
    }

    function halamanTambahAkun()
    {

        return view('tambah_akun');
    }

    public function tambahUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users', // Check for unique username
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'role' => 'required',
        ]);

        // Check if the username already exists before creating a new user
        $existingUser = User::where('username', $request->input('username'))->first();

        if ($existingUser) {
            return back()->withErrors(['error' => 'Username sudah digunakan. Silakan pilih username lain.']);
        }

        $hashedPassword = bcrypt($request->input('password'));

        $user = new User([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $hashedPassword,
            'role' => $request->input('role'),
        ]);

        if ($user->save()) {
            return redirect()->route('user')->with('success', 'Akun berhasil dibuat!');
        } else {
            return back()->withErrors(['error' => 'Error ketika menginput data ke database!']);
        }
    }

    function hapusUser($id)
    {
        $data = User::where('id', $id)->delete();
        if ($data) {
            return back()->with('success', 'Akun berhasil dihapus!');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika menghapus data ini!']);
        }
    }

    public function resetPassword($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->password = Hash::make('password123');
            $user->save();

            return back()->with('success', 'Password berhasil direset');
        } else {
            return back()->withErrors(['errors' => 'Ups!, Ada masalah ketika mereset password ini!']);
        }
    }
}

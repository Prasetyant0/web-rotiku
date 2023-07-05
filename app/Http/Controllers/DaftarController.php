<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function index()
    {
        return view('auth.daftar');
    }

    public function store(Request $request)
{
    $validateData = $request->validate([
        'name'      => 'required',
        'email'     => 'required|email|unique:users',
        'password'  => 'required|min:8',
        'confirm'   => 'required',
    ], [
        'name.required'     => 'Nama harus diisi',
        'email.required'    => 'Email harus diisi',
        'email.unique'      => 'Email sudah digunakan',
        'password.required' => 'Password harus diisi',
        'password.min'      => 'Password minimal 8 karakter',
        'confirm.required'  => 'Konfirmasi password harus diisi',
    ]);

    $existingUser = User::where('email', $validateData['email'])->first();

    if (!$existingUser) {
        if ($validateData['password'] === $validateData['confirm']) {
            $hashedPassword = Hash::make($validateData['password']);

            User::create([
                'name'      => $validateData['name'],
                'email'     => $validateData['email'],
                'password'  => $hashedPassword,
            ]);

            return redirect('/login')->with('success', 'Akun berhasil dibuat, silahkan login.');
        } else {
            $request->flashOnly('name', 'email', 'password', 'confirm');
            return redirect()->back()->with('error', 'Akun gagal dibuat, masukkan data yang sesuai!');
        }
    }
}


}

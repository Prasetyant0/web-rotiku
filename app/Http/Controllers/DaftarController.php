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
        'confirm'   => 'required|min:8',
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
            return redirect('/daftar')->with('error', 'Confirm password tidak sama!');
        }
    } else {
        return redirect()->route('daftar.user')->with('message', 'Username telah digunakan');
    }
}

}

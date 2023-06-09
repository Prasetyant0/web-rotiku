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
        $user = User::where('name', $request->name)->get();

        if ($user->isEmpty()) {
            $hasePassword = Hash::make($request->password);

            User::create([
                'name'      => $request -> name,
                'email'     => $request -> email,
                'password'  => $hasePassword,
            ]);
            return redirect('/login');
        }else{
            return redirect()->route('daftar.user')->with('message', 'Username Telah Digunakan');
        }

    }
}

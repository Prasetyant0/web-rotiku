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
            'name'      =>  'required', 
            'email'     =>  'required|email|unique:users', 
            'password'  =>  'required|min:8', 
            'confirm'   =>  'required|min:8', 
        ]);


        $user = User::where('email', $validateData['email'])->get();

        if ($user->isEmpty()) {
            
            if ($validateData['password'] === $validateData['confirm']) {
          
                $hasePassword = Hash::make($validateData['password']);

                User::create([
                    'name'      =>  $validateData['name'],
                    'email'     =>  $validateData['email'],
                    'password'  => $hasePassword,
                ]);
                return redirect('/login');
                
            }
            else{
                return "password lu gak sama njirs";
            }
        }else{
            return "akun sudah terdaftar";
            // return redirect()->route('daftar.user')->with('message', 'Username Telah Digunakan');
        }

    }
}

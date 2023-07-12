<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('dashboard');
        } elseif ($user->isDriver()) {
            return redirect()->route('driver.dashboard');
        } else {
            return redirect()->route('menu');
        }
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$request->filled('email') || !$request->filled('password')) {
            return redirect('/login')->with('warning', 'Email dan password harus diisi');
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect('admin/dashboard');
            } elseif ($user->isDriver()) {
                return redirect()->route('driver.dashboard');
            } else {
                return redirect()->route('menu');
            }
        } else {
            $request->flashOnly('email', 'password');
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/menu')->with('message', 'Anda berhasil logout');
    }

    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('menu');
            } else {
                $new_user = User::create([
                    'name' => ucwords($google_user->name),
                    'photo' => $google_user->avatar,
                    'email' => $google_user->email,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(10)),
                    'remember_token' => Str::random(10),
                ]);

                Auth::login($new_user);
                return redirect()->route('menu');
            }
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    public function logoutGoogle()
    {
        Auth::logout();
        return redirect('/menu')->with('message', 'Anda berhasil logout');
    }

    public function showProfile() {
        $accessToken = session('google_access_token');

        $response = Http::withToken($accessToken)->get('https://www.googleapis.com/oauth2/v1/userinfo');

        if ($response->ok()) {
            $userData = $response->json();

            $name = $userData['name'];
            $profilePicture = $userData['foto'];

            return view('frontend.layoutFrontend.pagesMenuRoti.navbarmenu')->with(['name' => $name, 'foto' => $profilePicture]);
        }
    }
}

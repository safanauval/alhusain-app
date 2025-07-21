<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLogin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Manual authentication (since we're not using Laravel's built-in auth)
        $user = UserLogin::where('username', $credentials['username'])->first();

        if ($user && $credentials['password'] === $user->password) {
            // Store user in session
            $request->session()->put('username', $user->username);

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah!',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/');
    }
}
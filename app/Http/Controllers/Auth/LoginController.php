<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.masuk');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt login for the default 'web' guard
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // Redirect to the dashboard
        }

        // Attempt login for the 'asesor' guard
        if (Auth::guard('asesor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // Redirect to the dashboard
        }

        // If both login attempts fail, return an error response
        return "gagal";
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function installer()
    {
        if (Auth::check()) {
            if (auth()) {
                return redirect('/home');
            } 
        }
        return view('v_frontend.form_installer');
    }

    public function login()
    {
        if (Auth::check()) {
            if (auth()) {
                return redirect('/home');
            } 
        }
        return view('v_frontend.login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::check()) {
                if (auth()) {
                    return redirect('/home');
                } 
            }
        }
        return back()
            ->withErrors([
                'email' => 'email atau password anda salah.',
            ])
            ->onlyInput('email');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

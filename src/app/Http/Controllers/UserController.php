<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        $userData = $request->only(['email', 'password']);
        $userRemember = $request->filled('remember');

        if (Auth::attempt($userData, $userRemember)) {
            $request->session()->regenerate();

            if ($userRemember) {
                $minutes = 1;
                $cookie = Cookie::make('remember_token', Auth::user()->remember_token, $minutes);
                return redirect()->route('index')->withCookie($cookie);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function index()
    {
        return view('index');
    }
}

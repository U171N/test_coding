<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Define custom validation rules for the login form
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed, redirect based on user's role
            if (Auth::user()->peran === 'siswa') {
                return redirect()->route('dashboard.siswa'); // Replace with your actual student dashboard route name
            } else if (Auth::user()->peran === 'instruktur') {
                return redirect()->route('activity.show'); // Replace with your actual instructor dashboard route name
            } else {
                return redirect('/login');
            }
        }

        // Authentication failed
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}


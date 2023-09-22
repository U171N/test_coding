<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;

class RegisterController extends Controller
{

    public function showRegistrationForm()
{
    return view('auth.register');
}


public function register(Request $request)
{
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create a new user record in the database
    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'peran'=>'siswa'
    ]);

    return redirect('/welcome');
}
}

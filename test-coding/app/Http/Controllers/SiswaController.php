<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Lesson;
use Illuminate\Http\Request;
class SiswaController extends Controller
{
    public function Dashboard(){
        $agenda = Lesson::latest()->get();
        return view('siswa/siswa_dashboard',compact('agenda'));
    }

    public function keluar(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

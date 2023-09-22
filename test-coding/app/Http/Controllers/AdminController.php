<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show(){
        $agenda = Lesson::latest()->get();
        return view('admin/admin_dashboard',compact('agenda'));
    }

    public function tambah()
    {
        $agenda =Lesson::latest()->get();
        return view('admin/activity/AddActivity', compact('agenda'));
    }

    public function store(Request $request){
        Lesson::insert([
            'judul'=>$request->judul,
            'deskripsi' =>$request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir'=>$request->tanggal_berakhir,
        ]);
        $notification =array(
            'message' => 'Input Data Berhasil',
            'alert-type'=>'info'
        );

        return redirect()->route('activity.show')->with($notification);
    }

    public function EditActivity($id){
        $agenda=Lesson::findOrFail($id);
        return view('admin/activity/EditActivity',compact('agenda'));
    }


     public function UpdateActivity(Request $request){
        $id = $request->id;
        Lesson::findOrFail($id)->update([
            'judul'=>$request->judul,
            'deskripsi' =>$request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir'=>$request->tanggal_berakhir,
        ]);

        $notification = array(
            'message' => 'Data  berhasil di Update',
            'alert-type' => 'success',
        );
        return redirect()->route('activity.show')->with($notification);
    }


    public function Delete($id){
        $agenda =Lesson::findOrFail($id);
        Lesson::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Data berhasil dihapus',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function keluar(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

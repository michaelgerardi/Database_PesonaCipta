<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Divisi;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_jabatan = \Auth::User()->id_jabatan;
        $id_divisi = \Auth::User()->id_divisi;
        $admin = User::where('id',Auth::User()->id)->first();
        return view ('profileadmin',compact('id_jabatan','admin','id_divisi'));
    }

    public function editAdmin($id)
    {
        $admin = User::where('id',$id)->first();
        return view ('editprofadmin',['admin' => $admin]);
    }

    public function updateAdmin()
    {
        
    }
}

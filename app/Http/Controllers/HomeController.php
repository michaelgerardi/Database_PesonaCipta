<?php

namespace App\Http\Controllers;

use App\Models\Lokasi_Kerja;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_kar = Auth::user()->id;
        // $id = User::where('id',$id_kar)->value('id');
        $lokasi = Lokasi_Kerja::all();
        $kary = User::all();
        return view('home', compact('id_kar','kary','lokasi'));
    }
}

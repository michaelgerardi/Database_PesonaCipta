<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\DataGajiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Data_Gaji;
use Illuminate\Support\Facades\DB;
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

    public function updateAdmin(Request $request)
    {
        $id = Auth::user()->id;
        User::where('id', $id)->update([
            'nama_karyawan'=>$request->nama_karyawan,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_ktp'=>$request->no_ktp,
            'no_kk'=>$request->no_kk,
            'jml_tanggungan'=>$request->jml_tanggungan,
            'alamat'=>$request->alamat,
            'umur'=>$request->umur,
            'tgl_lahir'=>$request->tgl_lahir,
            'npwp'=>$request->npwp,
            'no_rek'=>$request->no_rek,
            'email'=>$request->no_rek,
            'no_bpjs'=>$request->no_bpjs,
        ]);
        return redirect('/profileadmin');
    }

    public function formGaji($id)
    {
        $karyawan = User::where('id',$id)->first();
        return view('addgajikar',compact('karyawan'));
        // return $karyawan;
    }

    public function addGaji(Request $request)
    {
        // $id_karyawan = Auth::user()->id;
        $id = User::where('id',$request->id)->value('id');
        DB::table('data_gaji')->insert([
            'id_karyawan'=>$request->id,
            'gaji_pokok'=>$request->gaji_pokok,
            'gaji_tunjangan'=>$request->gaji_tunjangan,
            'thr'=>$request->thr,
            'bpjs'=>$request->bpjs,
        ]);
        $id_gaji = Data_Gaji::where('id_karyawan',$request->id)->latest('created_at')->value('id');
        DB::table('history_gaji')->insert([
            'tanggal_gaji'=>$request->tanggal_gaji,
            'status'=> '1',
            'id_gaji_karyawan'=>$id_gaji //kiri masuk ke kolom tabel, kanan data inputan
        ]);

        return redirect('/datakar');
    }

    public function historyGaji()
    {
        $admin = User::where('id',Auth::User()->id)->first();
        return view ('profileadmin',compact('id_jabatan','admin','id_divisi'));
    }

    public function export() 
    {
        return Excel::download(new DataGajiExport, 'data_gaji.xlsx');
    }
}

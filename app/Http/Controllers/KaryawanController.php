<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use\App\Models\User;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Kehadiran;
use App\Models\Data_Gaji;
use App\Models\History_Gaji;
use Auth;


class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formAddKar()
    {
        return view('addkaryawan');
    }

    public function indexKar() //Admin Tabel
    {
        $id_kar = Auth::user()->id;
        // $id = User::where('id',$id_kar)->value('id');
        $kary = User::all();
        return view('datakar',compact('id_kar','kary'));
        // return $kary;
    }

    public function addKar(Request $request)
    {
        // $this->validate($request, [
        //     'id' => 'required',
        //     'nip' => 'required',
        //     'nama_karyawan' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'no_ktp' => 'required',
        //     'no_kk' => 'required',
        //     'status' => 'required',
        //     'jml_tanggungan' => 'required',
        //     'alamat' => 'required',
        //     'umur' => 'required',
        //     'tgl_lahir' => 'required',
        //     'npwp' => 'required',
        //     'no_rek' => 'required',
        //     'email' => 'required',
        //     'no_bpjs' => 'required',
        //     'password' => 'required',
        //     'masa_jabatan' => 'required',
        //     'id_jabatan' => 'required',
        //     'id_divisi' => 'required'
        // ]);

        $id =  Auth::user()->id;
        $id_admin = User::where('id',$id)->value('id');
        $user= new User([
            'id' => $request->id,
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_ktp' => $request->no_ktp,
            'no_kk' => $request->no_kk,
            'status' => $request->status,
            'jml_tanggungan' => $request->jml_tanggungan,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'tgl_lahir' => $request->tgl_lahir,
            'npwp' => $request->npwp,
            'no_rek' => $request->no_rek,
            'email' => $request->email,
            'no_bpjs' => $request->no_bpjs,
            'password' => Hash::make($request->password),
            'masa_jabatan' => $request->masa_jabatan,
            'id_jabatan' => $request->id_jabatan,
            'id_divisi' => $request->id_divisi
        ]);
		$user->save();
        return redirect("/datakar");
        // return $id_admin;
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    //Absensi
    public function dataAbsenKar()
    {
        $id_karyawan = Auth::user()->id;
        $divisi = User::where('id',$id_karyawan)->value('id_divisi');
        $karyawan = User::where([['id_divisi',$divisi],['id_jabatan','!=','4']])->get();
        return view ('dataabsenkar',compact('karyawan'));
    } //manajer

    public function lihatAbsen()
    {
        $idkar = Auth::user()->id;
        $divisi = User::where('id',$idkar)->value('id_divisi');
        $karyawan = User::where([['id_divisi',$divisi],['id_jabatan','!=','4'],['id',$idkar]])->first();
        $kehadiran = Kehadiran::where('id_karyawan',$karyawan->id)->get();
        return view ('dataabsenkar',compact('karyawan','kehadiran'));
    }//karyawan biasa

    public function addMasuk(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = Auth::User()->id;
        $tanggal = date("Y-m-d");
        $time = date("H:i:s");
        $id_pic = User::where('id',$id)->value('id');
        $i=1;
        foreach($request->id as $row)
        {
            $absen = new Kehadiran([
                'id_karyawan' => $request->id[$i],
                'tanggal_masuk' => $tanggal,
                'jam_masuk' => $time,
                'status' => $request->status[$i]
            ]);
            $i++;
            $absen->save();
        }
        return redirect("/dataabsenkar");
        // return $absen;
    }

    public function addPulang(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = Auth::User()->id;
        $tanggal = date("Y-m-d");
        // $timeGoHome = strtotime('17:00:00');
        $timeGoHome = date("H:i:s");
        $id_pic = User::where('id',$id)->value('id');
        $i=1;
        foreach($request->id as $row1)
        {
            Kehadiran::where([['id_karyawan',$request->id[$i]],['tanggal_masuk',$tanggal]])->update([
                'jam_keluar' => $timeGoHome
            ]);
            $i++;
        }
        return redirect ("/dataabsenkar")->with('success');
        // return $pulang;
    }

    //Penggajian
    public function dataGajikar()
    {
        $id_karyawan = Auth::user()->id;
        $datagaji = Data_Gaji::where('id_karyawan',$id_karyawan)->value('id');
        $karyawan = Data_Gaji::where([['id',$datagaji]])->first();
        $histogaji = History_Gaji::where('id_gaji_karyawan',$datagaji)->get();
        return view ('datagajikar',compact('histogaji','datagaji','karyawan'));
        // return $histogaji;
    }
}

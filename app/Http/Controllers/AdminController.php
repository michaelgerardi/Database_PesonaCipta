<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Exports\DataGajiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jabatan;
use App\Models\Kehadiran;
use App\Models\Data_Gaji;
use App\Models\Data_Paklarin;
use App\Models\Divisi;
use App\Models\History_Gaji;
use App\Models\Lokasi_Kerja;
use App\Models\Kontrak_Kerja;
use Illuminate\Support\Facades\DB;
// use Auth;
use Illuminate\Support\Facades\Auth;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;


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
            'nip'=>$request->nip,
            'nama_karyawan'=>$request->nama_karyawan,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_ktp'=>$request->no_ktp,
            'no_kk'=>$request->no_kk,
            'jml_tanggungan'=>$request->jml_tanggungan,
            'alamat'=>$request->alamat,
            'tgl_lahir'=>$request->tgl_lahir,
            'npwp'=>$request->npwp,
            'no_rek'=>$request->no_rek,
            'email'=>$request->email,
            'no_bpjs'=>$request->no_bpjs,
            'status'=>$request->status,
            'password'=> Hash::make($request->password),
            'id_jabatan' => $request->id_jabatan,
            'id_divisi' => $request->id_divisi,
            'id_lokasikerja' => $request->id_lokasikerja
        ]);
        return redirect('/profileadmin');
    }

    // TAMBAH KARYAWAN
    public function addKar(Request $request)
    {
        $id =  Auth::user()->id;
        $id_admin = User::where('id',$id)->value('id');
        $this->validate($request,[
            'nip' => 'required',
            'nama_karyawan' => 'required',
            'jenis_kelamin' => 'required',
            'no_ktp' => 'required',
            'no_kk' => 'required',
            'jml_tanggungan' => 'required|numeric',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'npwp' => 'required',
            'no_rek' => 'required',
            'email' => 'required',
            'no_bpjs' => 'required',
            'status' => 'required',
            'password' => 'required',
            'id_jabatan' => 'required',
            'id_divisi' => 'required',
            'id_lokasikerja' => 'required'
        ]);

        $user= new User([
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_ktp' => $request->no_ktp,
            'no_kk' => $request->no_kk,
            'jml_tanggungan' => $request->jml_tanggungan,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'npwp' => $request->npwp,
            'no_rek' => $request->no_rek,
            'email' => $request->email,
            'no_bpjs' => $request->no_bpjs,
            'status' => $request->status,
            'password' => Hash::make($request->password),
            'id_jabatan' => $request->id_jabatan,
            'id_divisi' => $request->id_divisi,
            'id_lokasikerja' => $request->id_lokasikerja
        ]);
		$user->save();
        return redirect("/datakar");
        // return $user;
    }

    //Lokasi Kerja
    public function lokKerja()
    {
        $lokkerja = Lokasi_Kerja::all();
        return view ('lokkerja',compact('lokkerja'));
    }

    public function formAddLK()
    {
        return view('formlokasiker');
    }

    public function addLokKerja(Request $request)
    {
        // $id_karyawan = Auth::user()->id;
        $id = Lokasi_Kerja::where('id',$request->id)->value('id');
        $this->validate($request,[
            'nama_lokasi' => 'required',
            'alamat_lokasi' => 'required',
            'kode_pos' => 'required',
            'no_telp' => 'required',
            'fax' => 'required',
            'umr' => 'required',
        ]);

        DB::table('lokasi_kerja')->insert([
            'nama_lokasi'=>$request->nama_lokasi,
            'alamat_lokasi'=>$request->alamat_lokasi,
            'kode_pos'=>$request->kode_pos,
            'no_telp'=>$request->no_telp,
            'fax'=>$request->fax,
            'umr' =>$request->umr
        ]);
        return redirect('/lokkerja');
    }

    public function formEditLokKerja($id)
    {
        $lokker = Lokasi_Kerja::where('id',$id)->first();
        return view ('editlokkerja',['lokker' => $lokker]);
    }

    public function updateLokKerja(Request $request)
    {
        $id = Lokasi_Kerja::where('id',$request->id)->value('id');
        Lokasi_Kerja::where('id', $id)->update([
            'nama_lokasi'=>$request->nama_lokasi,
            'alamat_lokasi'=>$request->alamat_lokasi,
            'kode_pos'=>$request->kode_pos,
            'no_telp'=>$request->no_telp,
            'fax'=>$request->fax,
            'umr' =>$request->umr
        ]);
        return redirect('/lokkerja');
    }

    // public function deleteLokkerja($id)
    // {
    //     $lokker = Lokasi_Kerja::find($id);
    //     $lokker->delete();
    //     return redirect('/lokkerja');
    // }

    //Kontrak Kerja
    // public function kontrakKerja($id)
    // {
    //     $user = User::where('id',$id)->first();
    //     return view('formkontrakkerja',compact('user'));
    //     // return $user;
    // }

    // public function addKontrakKerja(Request $request)
    // {
    //     DB::table('kontrak_kerja')->insert([
    //         'nilai_kontrak'=>$request->nilai_kontrak,
    //         'awal_kontrak'=>$request->awal_kontrak,
    //         'akhir_kontrak'=>$request->akhir_kontrak,
    //         'durasi_kontrak'=>$request->durasi_kontrak,
    //         'id_lokasi_kerja'=>$request->id_lokasi_kerja,
    //         'id_karyawan'=>$request->id_karyawan
    //     ]);
    //     return redirect('/datakar');
    // }

    //Data Jabatan
    public function indexjabatan()
    {
        $jabat = Jabatan::all();
        return view ('listjabatan',compact('jabat'));
    }

    public function addJabatan(Request $request)
    {
        // $id_karyawan = Auth::user()->id;
        $tamjab = Jabatan::where('id',$request->id)->value('id');
        DB::table('jabatan')->insert([
            'gol_jabatan'=>$request->gol_jabatan,
            'persentase'=>$request->persentase
        ]);
        return redirect('/listjabatan');
    }

    public function updateJabatan(Request $request)
    {
        $id = Jabatan::where('id',$request->id)->value('id');
        Jabatan::where('id', $id)->update([
            'gol_jabatan'=>$request->gol_jabatan,
            'persentase'=>$request->persentase
        ]);
        return redirect('/listjabatan');
    }

    //Data Jabatan
    public function indexDivisi()
    {
        $divisi = Divisi::all();
        return view ('divisi',compact('divisi'));
    }

    public function addDivisi(Request $request)
    {
        // $id_karyawan = Auth::user()->id;
        $tamdiv = Divisi::where('id',$request->id)->value('id');
        DB::table('divisi')->insert([
            'divisi'=>$request->divisi,
            'persen'=>$request->persen
        ]);
        return redirect('/divisi');
    }

    public function updateDivisi(Request $request)
    {
        $id = Divisi::where('id',$request->id)->value('id');
        Divisi::where('id', $id)->update([
            'divisi'=>$request->divisi,
            'persen'=>$request->persen
        ]);
        return redirect('/divisi');
    }

    // public function deleteJabatan($id)
    // {
    //     DB::table('lokasi_kerja')->where('id',$id)->delete();
    //     $deljab = Jabatan::find($id);
    //     $deljab->delete();
    //     return redirect('/lokkerja');
    // }

    //Data Paklarin
    // public function paklarin($id)
    // {
    //     $user = User::where('id',$id)->first();
    //     // $konker = Kontrak_Kerja::where('id',$id)->first();
    //     return view('formpaklarin',compact('user'));
    //     // return $user;
    // }

    // public function addDataPak(Request $request)
    // {
    //     DB::table('data_paklarin')->insert([
    //         'nama_karyawan'=>$request->nama_karyawan,
    //         'no_ktp'=>$request->no_ktp,
    //         'tgl_awal_kerja'=>$request->tgl_awal_kerja,
    //         'tgl_akhir_kerja'=>$request->tgl_akhir_kerja,
    //         'no_bpjs'=>$request->no_bpjs,
    //         'id_karyawan'=>$request->id_karyawan,
    //         'id_kontrak_kerja'=>$request->id_kontrak_kerja
    //     ]);
    //     return redirect('/datakar');
    // }

    // public function downDataPak($data)
    // {
    //     $pdf = PDF::loadView('pdf.invoice', $data);
    //     return $pdf->download('invoice.pdf');
    // }

    public function pdfPaklarin($id)
    {
        $user = User::where('id',$id)->value('id');
        $kontrak = Kontrak_Kerja::where('id_karyawan',$id)->first();
        $loker = Lokasi_Kerja::where('id',$kontrak->id_lokasi_kerja)->first();
        $data = Data_Paklarin::where('id_karyawan',$id)->first();
        //view()->share('user',$data);
        $pdf = PDF::loadView('/paklarin',compact('data','user','loker'))->setPaper('a4','potrait');
        return $pdf->stream('data_paklarin.pdf');
        //return $user;
    }
}

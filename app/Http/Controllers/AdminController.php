<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\DataGajiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jabatan;
use App\Models\Kehadiran;
use App\Models\Data_Gaji;
use App\Models\Data_Paklarin;
use App\Models\Lokasi_Kerja;
use App\Models\Kontrak_Kerja;
use Illuminate\Support\Facades\DB;
use Auth;
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

    public function historyGaji()
    {
        $gaji = User::all();
        return view('historygaji',compact('gaji'));
        // return $gaji;
    }

    public function formGaji($id)
    {
        $karyawan = User::where('id',$id)->first();
        return view('addgajikar',compact('karyawan'));
        // return $karyawan;
    }

    public function addGaji(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $gaji=Lokasi_Kerja::where("id",$user->id_lokasikerja)->value('umr');
        $jabatan=Jabatan::where("id",$user->id_jabatan)->value('persentase');
        $ttlgaji=$gaji+($gaji*($jabatan/100)); //gaji total satu bulan
        $perjam=$ttlgaji/240; //untuk dapat gaji per jam (1 hari 8 jam kerja)
        $transdate = date('m'); //untuk ambil bulan saat penggajian
        $jmlabsen = Kehadiran::where([
            ['id_karyawan',$request->id],
            ])->whereMonth('tanggal_masuk',$transdate)->count(); //hari masuk kerja
        $basegaji=0; //antisipasi error
        $basegaji=($jmlabsen*8)*$perjam; //jumlah absen dikali 8 jam kerja dikali gajiperjam
        $baligasik = Kehadiran::where([
            ['id_karyawan',$request->id],
            ['lembur','<',0],
            ])->whereMonth('tanggal_masuk',$transdate)->sum('lembur'); //jam kerja belum sampek 8 jam kerja
        $potonggaji=0; //antisipasi error
        $potonggaji=$baligasik*$perjam; //selisih dari pulang kerja duluan dikali gaji per jam
        $balikeri = Kehadiran::where([
            ['id_karyawan',$request->id],
            ['lembur','>',0],
            ])->whereMonth('tanggal_masuk',$transdate)->sum('lembur'); //jam kerja lembur (lebih dari 8 jam kerja)
        $bonus=0;
        $bonus=$balikeri*15000; //kalkulasi gaji lembur
        $gajibulaninikotor=$basegaji+$potonggaji+$bonus; //gaji kotor
        $bpjs = $gajibulaninikotor*1.74; //pengurangan BPJS tenaga kerja
        $gajibulanbersih = $gajibulaninikotor-$bpjs; //gaji bersih setelah bpjs
        DB::table('data_gaji')->insert([
            'id_karyawan'=>$request->id,
            'gaji_pokok'=>$gajibulanbersih,
            'gaji_tunjangan'=>$request->gaji_tunjangan,
            'thr'=>$request->thr,
            'bpjs'=>$bpjs,
        ]);
        $id_gaji = Data_Gaji::where('id_karyawan',$request->id)->latest('created_at')->value('id');
        DB::table('history_gaji')->insert([
            'tanggal_gaji'=>$request->tanggal_gaji,
            'status'=> '1',
            'id_gaji_karyawan'=>$id_gaji //kiri masuk ke kolom tabel, kanan data inputan
        ]);

        return redirect('/historygaji');
        //return $potonggaji;
    }

    public function formEditGaji($id)
    {
        // $id_kar = Data_Gaji::where('id',$id)->value('id_karyawan');
        $user = User::where('id',$id)->first();
        $gaji = Data_Gaji::where('id_karyawan',$id)->first();
        return view('editgajikar', compact('user','gaji'));
        // return $user;
    }

    public function editGaji(Request $request)
    {
        $id = User::where('id',$request->id)->value('id');
        DB::table('data_gaji')->where('id',$request->id_gaji_karyawan)->update([
            'id_karyawan'=>$request->id,
            'gaji_pokok'=>$request->gaji_pokok,
            'gaji_tunjangan'=>$request->gaji_tunjangan,
            'thr'=>$request->thr,
            'bpjs'=>$request->bpjs,
        ]);
        $id_gaji = Data_Gaji::where('id_karyawan',$request->id)->latest('created_at')->value('id');
        DB::table('history_gaji')->where('id_gaji_karyawan',$request->id_gaji_karyawan)->update([
            'tanggal_gaji'=>$request->tanggal_gaji,
            'status'=> '1',
            'id_gaji_karyawan'=>$id_gaji //kiri masuk ke kolom tabel, kanan data inputan
        ]);

        return redirect('/historygaji');
    }

    public function export()
    {
        return Excel::download(new DataGajiExport, 'data_gaji.xlsx');
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
    public function kontrakKerja($id)
    {
        $user = User::where('id',$id)->first();
        return view('formkontrakkerja',compact('user'));
        // return $user;
    }

    public function addKontrakKerja(Request $request)
    {
        DB::table('kontrak_kerja')->insert([
            'nilai_kontrak'=>$request->nilai_kontrak,
            'awal_kontrak'=>$request->awal_kontrak,
            'akhir_kontrak'=>$request->akhir_kontrak,
            'durasi_kontrak'=>$request->durasi_kontrak,
            'id_lokasi_kerja'=>$request->id_lokasi_kerja,
            'id_karyawan'=>$request->id_karyawan
        ]);
        return redirect('/datakar');
    }

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

    // public function deleteJabatan($id)
    // {
    //     DB::table('lokasi_kerja')->where('id',$id)->delete();
    //     $deljab = Jabatan::find($id);
    //     $deljab->delete();
    //     return redirect('/lokkerja');
    // }

    //Data Paklarin
    public function paklarin($id)
    {
        $user = User::where('id',$id)->first();
        // $konker = Kontrak_Kerja::where('id',$id)->first();
        return view('formpaklarin',compact('user'));
        // return $user;
    }

    public function addDataPak(Request $request)
    {
        DB::table('data_paklarin')->insert([
            'nama_karyawan'=>$request->nama_karyawan,
            'no_ktp'=>$request->no_ktp,
            'tgl_awal_kerja'=>$request->tgl_awal_kerja,
            'tgl_akhir_kerja'=>$request->tgl_akhir_kerja,
            'no_bpjs'=>$request->no_bpjs,
            'id_karyawan'=>$request->id_karyawan,
            'id_kontrak_kerja'=>$request->id_kontrak_kerja
        ]);
        return redirect('/datakar');
    }

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

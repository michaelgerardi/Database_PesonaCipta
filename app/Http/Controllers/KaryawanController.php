<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataGajiExport;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Kehadiran;
use App\Models\Data_Gaji;
use App\Models\History_Gaji;
use App\Models\Lokasi_Kerja;
use Auth;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;


class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function formAddKar()
    // {
    //     return view('addkaryawan');
    // }

    public function indexKar() //Admin Tabel
    {
        $id_kar = Auth::user()->id;
        // $id = User::where('id',$id_kar)->value('id');
        $kary = User::all();
        return view('datakar',compact('id_kar','kary'));
        // return $kary;
    }

    public function historyGaji(Request $request)
    {
        $pieces = explode("-",date('Y-m'));
        if (count($request->all())>0) {
            $pieces = explode("-", $request->tanggal_gaji);
            $histgaji=History_Gaji::where('status','1')->whereYear('tanggal_gaji',$pieces[0])->whereMonth('tanggal_gaji',$pieces[1])->pluck('id_gaji_karyawan');
            if ($request->statgaji=='1') {
                $datagaji=Data_Gaji::whereIn('id',$histgaji)->pluck('id_karyawan');
            }elseif ($request->statgaji=='2') {
                $data=Data_Gaji::whereIn('id',$histgaji)->pluck('id_karyawan');
                $datagaji=User::whereNotIn('id',$data)->pluck('id');
            }
            
            $gaji=User::whereIn('id',$datagaji)->where([
                ['id_divisi',$request->divisi]
                ])->get();
        }
        else{
            $gaji = User::all();
        }

        $data_divisi = Divisi::all();
        $his_gaji = History_Gaji::all();
        return view('historygaji',compact('gaji','data_divisi','his_gaji','pieces'));
        
        //return $gaji;
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
        $basegaji=0; //deklarasi awal supaya tidak terjadi error
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
        if($gajibulaninikotor<0){
            $gajibulaninikotor=0;
        }
        $bpjs = $gajibulaninikotor*0.01; //pengurangan BPJS tenaga kerja
        $gajibulanbersih = $gajibulaninikotor-$bpjs; //gaji bersih setelah bpjs
        DB::table('data_gaji')->insert([
            'id_karyawan'=>$request->id,
            'gaji_pokok'=>$gajibulanbersih,
            // 'gaji_tunjangan'=>$request->gaji_tunjangan,
            // 'thr'=>$request->thr,
            'bpjs'=>$bpjs,
        ]);
        $id_gaji = Data_Gaji::where('id_karyawan',$request->id)->latest('created_at')->value('id');
        DB::table('history_gaji')->insert([
            'tanggal_gaji'=>$request->tanggal_gaji,
            'status'=> '1',
            'id_gaji_karyawan'=>$id_gaji //kiri masuk ke kolom tabel, kanan data inputan
        ]);

        return redirect('/historygaji');
        // return $gajibulanbersih;
    }

    public function formEditGaji($id)
    {
        // $id_kar = Data_Gaji::where('id',$id)->value('id_karyawan');
        $user = User::where('id',$id)->first();
        $gaji = Data_Gaji::where('id_karyawan',$id)->first();
        $lokasi = Lokasi_Kerja::where('id_user',$id)->first();
        return view('editgajikar', compact('user','gaji','lokasi'));
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

    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    
    
    //karyawan biasa
     public function dataAbsenKar()
     {
         $id_karyawan = Auth::user()->id;
         $divisi = User::where('id',$id_karyawan)->value('id_divisi');
         $karyawan = User::where([['id_divisi',$divisi],['id',$id_karyawan]])->first();
         $kehadiran = Kehadiran::where('id_karyawan',$id_karyawan)->get();
         return view ('dataabsenkar',compact('karyawan','kehadiran'));
         // return $karyawan;
     } 

     //Absensi
     //Supervisor
    public function lihatAbsen()
    {
        $idkar = Auth::user()->id;
        $divisi = User::where('id',$idkar)->value('id_divisi');
        $karyawan = User::where([['id_divisi',$divisi]])->get();
        $karyawanid = User::where([['id_divisi',$divisi]])->pluck('id');
        $kehadiran = Kehadiran::whereIn('id_karyawan',$karyawanid)->get();
        return view ('dataabsenkar',compact('karyawan','kehadiran'));
        // return $karyawan;
    }

    public function addMasuk(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = Auth::User()->id;
        // $tanggal = date("Y-m-d");
        $time = date("H:i:s");
        $id_pic = User::where('id',$id)->value('id');
        $i=1;
        foreach($request->id as $row)
        {
            $absen = new Kehadiran([
                'id_karyawan' => $request->id[$i],
                // 'tanggal_masuk' => $tanggal,
                'tanggal_masuk' => $request->tanggal_masuk[$i],
                // 'jam_masuk' => $time,
                'jam_masuk' => $request->jam_masuk[$i],
                'status' => $request->status[$i]
            ]);
            $i++;
            $absen->save();
        }
        return redirect("/dataabsenkars");
        // return $absen;
    }

    public function addPulang(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = Auth::User()->id;
        // $tanggal = date("Y-m-d");
        $tanggal = $request->tanggal_masuk;
        // $timeGoHome = strtotime('17:00:00');
        $timeGoHome = date("H:i:s");
        $id_pic = User::where('id',$id)->value('id');
        $i=1;
        foreach($request->id as $row1)
        {
            $jammsk = Kehadiran::where([['id_karyawan',$request->id[$i]],['tanggal_masuk',$tanggal]])->value('jam_masuk');
            $date1=strtotime($jammsk);
            // $date2=strtotime($timeGoHome);
            $date2=strtotime($request->jam_keluar[$i]);
            $diff=round((($date2-$date1)/3600)-8,1);
            Kehadiran::where([['id_karyawan',$request->id[$i]],['tanggal_masuk',$tanggal]])->update([
                // 'jam_keluar' => $timeGoHome,
                'jam_keluar' => $request->jam_keluar[$i],
                'lembur' => $diff
            ]);
            $i++;
            
        }
        return redirect ("/dataabsenkars")->with('success');
      
        //  return $request->id[5];
    }

    //Penggajian
    public function dataGajikar()
    {
        $id_karyawan = Auth::user()->id;
        $datagaji = Data_Gaji::where('id_karyawan',$id_karyawan)->value('id');
        $karyawan = Data_Gaji::where([['id',$datagaji]])->first();
        $histogaji = History_Gaji::where('id_gaji_karyawan',$datagaji)->get();
        return view ('datagajikar',compact('histogaji','datagaji','karyawan','id_karyawan'));
        // return $histogaji;
    }
}

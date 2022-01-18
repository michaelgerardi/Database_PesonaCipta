<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Divisi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    public function query()
    {
        return User::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NIP',
            'Nama Karyawan',
            'Jenis Kelamin',
            'No KTP',
            'No KK',
            'Status',
            'Jumlah Tanggungan',
            'Alamat',
            'Umur',
            'Tanggal Lahir',
            'NPWP',
            'Nomor Rekening',
            'Email',
            'Nomor BPJS',
            'Masa Jabatan',
            'ID Jabatan',
            'ID Divisi',
        ];
    }

    public function map($User): array
    {
        if($User->jenis_kelamin==1){
            $jk='Pria';
        } else{
            $jk='Wanita';
        }

        if($User->status==1){
            $st='Aktif';
        } else{
            $st='Tidak Aktif';
        }

        $masa_jabatan = $User->masa_jabatan." Tahun";
        return [
            $User->id,
            $User->nip,
            $User->nama_karyawan,
            $jk,
            $User->no_ktp,
            $User->no_kk,
            $st,
            $User->jml_tanggungan,
            $User->alamat,
            $User->umur,
            $User->tgl_lahir,
            $User->npwp,
            $User->no_rek,
            $User->email,
            $User->no_bpjs,
            $masa_jabatan,
            Jabatan::where('id',$User->id_jabatan)->value('gol_jabatan'),
            Divisi::where('id',$User->id_divisi)->value('divisi'),
        ];
    }
}

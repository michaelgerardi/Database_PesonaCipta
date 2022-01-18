<?php

namespace App\Exports;

use App\Models\Data_Gaji;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Jabatan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataGajiExport implements FromQuery,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    public function query()
    {
        return Data_Gaji::query();
    }

    public function headings(): array
    {
        return[
            'ID',
            'NIP',
            'Nama Karyawan',
            'Divisi',
            'Jabatan',
            'Gaji Pokok',
            'Gaji Tunjangan',
            'THR',
            'BPJS',
            'Status'
        ];
    }

    public function map($Gaji): array
    {
        if($Gaji->status==1)
        {
            $st='Sudah Dibayarkan';
        } else
            {
                $st="Belum Dibayarkan";
            }

        return[
            $Gaji->id,
            User::where('id',$Gaji->id_karyawan)->value('nip'),
            User::where('id',$Gaji->id_karyawan)->value('nama_karyawan'),
            Divisi::where('id', User::where('id',$Gaji->id_karyawan)->value('id_divisi'))->value('divisi'),
            Jabatan::where('id', User::where('id',$Gaji->id_karyawan)->value('id_jabatan'))->value('gol_jabatan'),
            $Gaji->gaji_pokok,
            $Gaji->gaji_tunjangan,
            $Gaji->thr,
            $Gaji->bpjs,
            $st
        ];
    }
}

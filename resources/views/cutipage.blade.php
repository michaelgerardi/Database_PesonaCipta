@extends('layouts.app')

@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
            <h3 style="margin-bottom: 20px"><b>Form Pengajuan Cuti</b></h3>
                <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
                    <div class="col-sm-10">
                        {{-- <input type="hidden" class="form-control" name="id" id="id" value="{{$karcuti->id}}"> --}}
                        <input type="text" class="form-control" name="nip" id="nip" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label"><b>Nama</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="#">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="divisi" id="divisi" value="#">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label"><b>Jabatan</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="#">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lokasi_kerja" class="col-sm-2 col-form-label"><b>Lokasi Kerja</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lokasikerja" id="lokasikerja" value="#">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_cuti_awal" class="col-sm-2 col-form-label"><b>Mulai Cuti</b></label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_cuti_akhir" class="col-sm-2 col-form-label"><b>Mulai Cuti</b></label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <a href="" class="btn btn-primary" role="button" style="margin-bottom: 10px">Submit</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <h3 style="margin-bottom: 20px"><b>Daftar Absensi Cuti</b></h3>
                <table class="table">
                    <thead>
                        <th scope="col">No</th>
                        <th scope="col">Awal Cuti</th>
                        <th scope="col">Akhir Cuti</th>
                        <th scope="col">Opsi</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
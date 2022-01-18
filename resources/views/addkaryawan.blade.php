@extends('layouts.app')

@section('content')
<form action="{{ route('addDataKar') }}" method="post" enctype='multipart/form-data'>
@csrf
<div class="container">
    <br>
    <h3>Tambah Data Karyawan</h3>
    <br>
        <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP terisi secara otomatis">
            </div>
        </div>

        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Isi dengan nama karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="1">Pria</option>
                    <option value="2">Wanita</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Isi dengan nomor ktp karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Isi dengan nomor kartu keluarga">
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label"><b>Status</b></label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                    <option selected>Pilih Jenis Status Karyawan</option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="tanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="jml_tanggungan" id="jml_tanggungan" placeholder="Isi dengan jumlah tanggungan karyawan, misal 3">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
            <div class="col-sm-10">
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Isi dengan alamat karyawan sesuai dengan KTP"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Isi dengan tanggal lahir">
            </div>
        </div>

        <div class="form-group row">
            <label for="umur" class="col-sm-2 col-form-label"><b>Umur</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="umur" id="umur" placeholder="Isi dengan umur karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Isi dengan nomor NPWP karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="Isi dengan nomor rekening karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="email" placeholder="Isi dengan email karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" placeholder="Isi dengan nomor BPJS karyawan">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="password" id="password" placeholder="Isi dengan password default 123456789">
            </div>
        </div>

        <div class="form-group row">
            <label for="masajabatan" class="col-sm-2 col-form-label"><b>Masa Jabatan</b></label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="masa_jabatan" id="masa_jabatan">
                    <option selected>Pilih Masa Jabatan</option>
                    <option value="1">1 Tahun</option>
                    <option value="2">2 Tahun</option>
                    <option value="3">3 Tahun</option>
                    <option value="4">4 Tahun</option>
                    <option value="5">5 Tahun</option>
                    <option value="6">Masa Jabatan Hingga Pensiun</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="jabatan" class="col-sm-2 col-form-label"><b>Golongan Jabatan</b></label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_jabatan" id="id_jabatan">
                    <option selected>Pilih Golongan Jabatan</option>
                    <option value="1">Manajer</option>
                    <option value="2">Supervisor</option>
                    <option value="3">Karyawan</option>
                    <option value="4">Admin</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_divisi" id="id_divisi">
                    <option selected>Pilih Divisi Karyawan</option>
                    <option value="1">Keuangan</option>
                    <option value="2">Human Resource</option>
                    <option value="3">Lapangan</option>
                    <option value="4">Staff</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
        </div>
</div>
@endsection

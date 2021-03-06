@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3><b>Admin Profile</b></h3>
    <br>

<input type="hidden" class="form-control" name="id" id="id" value="{{ $admin->id }}">

    <div class="form-group row">
        <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nip" id="nip" value="{{ $admin->nip }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ $admin->nama_karyawan }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ $admin->jenis_kelamin }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="{{ $admin->no_ktp }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ $admin->no_kk }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label"><b>Status</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="status" id="status" value="{{ $admin->status }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="tanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="jml_tanggungan" id="jml_tanggungan" value="{{ $admin->jml_tanggungan }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $admin->alamat }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $admin->tgl_lahir }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="umur" class="col-sm-2 col-form-label"><b>Umur</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="umur" id="umur" value="{{ $admin->umur }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="npwp" id="npwp" value="{{ $admin->npwp }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_rek" id="no_rek" value="{{ $admin->no_rek }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" value="{{ $admin->email }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="{{ $admin->no_bpjs }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="masajabatan" class="col-sm-2 col-form-label"><b>Masa Jabatan</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="masa_jabatan" id="masa_jabatan" value="{{ $admin->masa_jabatan }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="jabatan" class="col-sm-2 col-form-label"><b>Golongan Jabatan</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="gol_jabatan" id="gol_jabatan" value="{{ DB::table('jabatan')->where('id',$admin->id_jabatan)->value('gol_jabatan') }}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="divisi" id="divisi" value="{{ DB::table('divisi')->where('id',$admin->id_divisi)->value('divisi') }}" disabled>
        </div>
    </div>

<a href="{{ route('formeditadmin',['id' => $admin->id]) }}" type="button" class="btn btn-warning">Edit</a>

</div>
@endsection

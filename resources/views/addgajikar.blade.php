@extends('layouts.app')

@section('content')
<form action="{{route('addgajikar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <br>
        <h3>Payroll Karyawan</h3>
        <br>

        <div class="form-group row">
            <label for="tglgaji" class="col-sm-2 col-form-label"><b>Tanggal Gaji</b></label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_gaji" id="tanggal_gaji">
            </div>
        </div>

        <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id" value="{{ $karyawan->id }}">
                <input type="text" class="form-control" name="nip" id="nip" value="{{ DB::table('users')->where('id',$karyawan->id)->value('nip') }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ DB::table('users')->where('id',$karyawan->id)->value('nama_karyawan') }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="gajipokok" class="col-sm-2 col-form-label"><b>Gaji Pokok</b></label>
            <div class="col-sm-10">
                <input type="text" onchange="myFunction()" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Isi dengan gaji pokok" value="0">
            </div>
        </div>

        <div class="form-group row">
            <label for="gajitun" class="col-sm-2 col-form-label"><b>Gaji Tunjangan</b></label>
            <div class="col-sm-10">
                <input type="text" onchange="myFunction()" class="form-control" name="gaji_tunjangan" id="gaji_tunjangan" placeholder="Isi dengan gaji tunjangan" value="0">
            </div>
        </div>

        <div class="form-group row">
            <label for="thr" class="col-sm-2 col-form-label"><b>THR</b></label>
            <div class="col-sm-10">
                <input type="text" onchange="myFunction()" class="form-control" name="thr" id="thr" placeholder="Isi dengan thr" value="0">
            </div>
        </div>

        <div class="form-group row">
            <label for="bpjs" class="col-sm-2 col-form-label"><b>BPJS</b></label>
            <div class="col-sm-10">
                <input type="text" onchange="myFunction()" class="form-control" name="bpjs" id="bpjs" placeholder="Isi dengan BPJS" value="0">
            </div>
        </div>

        <div class="form-group row">
            <label for="totalgaji" class="col-sm-2 col-form-label"><b>Total Gaji</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="valtot" id="valtot">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>

    </div>
</form>
@endsection
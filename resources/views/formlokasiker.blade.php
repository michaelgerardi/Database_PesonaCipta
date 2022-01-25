@extends('layouts.app')

@section('content')
<form action="{{route('addLK')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container">
        <br>
        <h3>Tambah Lokasi Kerja</h3>
        <br>

        <div class="form-group row">
            <label for="namalokasi" class="col-sm-2 col-form-label"><b>Nama Lokasi</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Ketik nama lokasi kerja dari mitra Pesona Cipta">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamatlokasi" class="col-sm-2 col-form-label"><b>Alamat Lokasi</b></label>
            <div class="col-sm-10">
                <textarea class="form-control" name="alamat_lokasi" id="alamat_lokasi" placeholder="Ketik alamat lokasi kerja dari mitra Pesona Cipta"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="kodepos" class="col-sm-2 col-form-label"><b>Kode Pos</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Ketik kode pos dari lokasi kerja mitra Pesona Cipta">
            </div>
        </div>

        <div class="form-group row">
            <label for="notelp" class="col-sm-2 col-form-label"><b>Nomor Telepon</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Ketik nomor telepon dari lokasi kerja mitra Pesona Cipta">
            </div>
        </div>

        <div class="form-group row">
            <label for="fax" class="col-sm-2 col-form-label"><b>FAX</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fax" id="fax" placeholder="Ketik nomor fax dari lokasi kerja mitra Pesona Cipta">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
        </div>

    </div>
</form>
@endsection
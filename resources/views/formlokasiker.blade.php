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
                <input type="text" class="form-control @error ('nama_lokasi') is-invalid @enderror" name="nama_lokasi" id="nama_lokasi" placeholder="Ketik nama lokasi kerja dari mitra Pesona Cipta" maxlength="100" value="{{old('nama_lokasi')}}">
                @error('nama_lokasi')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="alamatlokasi" class="col-sm-2 col-form-label"><b>Alamat Lokasi</b></label>
            <div class="col-sm-10">
                <textarea class="form-control @error ('alamat_lokasi') is-invalid @enderror" name="alamat_lokasi" id="alamat_lokasi" placeholder="Ketik alamat lokasi kerja dari mitra Pesona Cipta">{{old('alamat_lokasi')}}</textarea>
                @error('alamat_lokasi')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="kodepos" class="col-sm-2 col-form-label"><b>Kode Pos</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error ('kode_pos') is-invalid @enderror" name="kode_pos" id="kode_pos" placeholder="Ketik kode pos dari lokasi kerja mitra Pesona Cipta" value="{{old('kode_pos')}}">
                @error('kode_pos')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="notelp" class="col-sm-2 col-form-label"><b>Nomor Telepon</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error ('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" placeholder="Ketik nomor telepon dari lokasi kerja mitra Pesona Cipta" value="{{old('no_telp')}}">
                @error('no_telp')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="fax" class="col-sm-2 col-form-label"><b>FAX</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error ('fax') is-invalid @enderror" name="fax" id="fax" placeholder="Ketik nomor fax dari lokasi kerja mitra Pesona Cipta" value="{{old('fax')}}">
                @error('fax')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="umr" class="col-sm-2 col-form-label"><b>Upah Minimum Kerja</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error ('umr') is-invalid @enderror" name="umr" id="umr" placeholder="Masukan nominal UMR lokasi kerja mirta Pesona Cipta" value="{{old('umr')}}">
                @error('umr')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
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
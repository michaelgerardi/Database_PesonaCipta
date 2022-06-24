@extends('layouts.app')

@section('content')
<form action="{{route('editlokkerja')}}" method="post" enctype="multipart/form-data">
    @php echo csrf_field() @endphp
    <div class="container">
        <br>
        <h3>Edit Lokasi Kerja</h3>
        <br>

        <div class="form-group row">
            <label for="namalokasi" class="col-sm-2 col-form-label"><b>Nama Lokasi</b></label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id" value="{{ $lokker->id }}">
                <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" value="{{ DB::table('lokasi_kerja')->where('id',$lokker->id)->value('nama_lokasi') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamatlokasi" class="col-sm-2 col-form-label"><b>Alamat Lokasi</b></label>
            <div class="col-sm-10">
                <input type="textarea" class="form-control" name="alamat_lokasi" id="alamat_lokasi" value="{{ DB::table('lokasi_kerja')->where('id',$lokker->id)->value('alamat_lokasi') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="kodepos" class="col-sm-2 col-form-label"><b>Kode Pos</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="{{ DB::table('lokasi_kerja')->where('id',$lokker->id)->value('kode_pos') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="notelp" class="col-sm-2 col-form-label"><b>Nomor Telepon</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ DB::table('lokasi_kerja')->where('id',$lokker->id)->value('no_telp') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="fax" class="col-sm-2 col-form-label"><b>FAX</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fax" id="fax" value="{{ DB::table('lokasi_kerja')->where('id',$lokker->id)->value('fax') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="umr" class="col-sm-2 col-form-label"><b>Upah Minimum Kerja</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="umr" id="umr" value="{{ DB::table('lokasi_kerja')->where('id',$lokker->id)->value('umr') }}">
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
@extends('layouts.app')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
    @php echo csrf_field() @endphp

    <div class="container">
        <br>
        <h3>Data Paklarin Karyawan</h3>
        <br>

        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ DB::table('users')->where('id',$user->id)->value('nama_karyawan') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="{{ DB::table('users')->where('id',$user->id)->value('no_ktp') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="tglawalkerja" class="col-sm-2 col-form-label"><b>Tanggal Awal Kerja</b></label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_awal_kerja" id="tgl_awal_kerja" placeholder="Pilih tanggal awal kerja">
            </div>
        </div>

        <div class="form-group row">
            <label for="tglakhirkerja" class="col-sm-2 col-form-label"><b>Tanggal Akhir Kerja</b></label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_akhir_kerja" id="tgl_akhir_kerja" placeholder="Pilih tanggal akhir kerja">
            </div>
        </div>

        <div class="form-group row">
            <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="{{ DB::table('users')->where('id',$user->id)->value('no_bpjs') }}">
            </div>
        </div>

    </div>
    </form>
@endsection

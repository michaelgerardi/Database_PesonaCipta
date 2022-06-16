@extends('layouts.app')

@section('content')
    <form action="{{route('adddatapak')}}" method="post" enctype="multipart/form-data">
    @php echo csrf_field() @endphp

    <div class="container">
        <br>
        <h3>Data Paklarin Karyawan</h3>
        <br>

        <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_karyawan" value="{{ $user->id }}">
                <input type="text" class="form-control" name="nip" id="nip" value="{{ DB::table('users')->where('id',$user->id)->value('nip') }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ DB::table('users')->where('id',$user->id)->value('nama_karyawan') }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="{{ DB::table('users')->where('id',$user->id)->value('no_ktp') }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="tglawalkerja" class="col-sm-2 col-form-label"><b>Tanggal Awal Kerja</b></label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_kontrak_kerja" value="{{ DB::table('kontrak_kerja')->where('id_karyawan',$user->id)->value('id') }}">
                <input type="text" class="form-control" name="tgl_awal_kerja" id="tgl_awal_kerja" value="{{ DB::table('kontrak_kerja')->where('id_karyawan',$user->id)->value('awal_kontrak') }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="tglakhirkerja" class="col-sm-2 col-form-label"><b>Tanggal Akhir Kerja</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tgl_akhir_kerja" id="tgl_akhir_kerja" value="{{ DB::table('kontrak_kerja')->where('id_karyawan',$user->id)->value('akhir_kontrak') }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="{{ DB::table('users')->where('id',$user->id)->value('no_bpjs') }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <a href="{{route('downloadpak',['id'=>$user])}}" class="btn btn-warning" type="button">Download PDF</a>
            </div>
        </div>

    </div>
    </form>
@endsection

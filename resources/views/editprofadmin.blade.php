@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3><b>Edit Profile</b></h3>
    <br>

    <form action="{{ route('upprofiladmin') }}" method="post" enctype='multipart/form-data'>
        @php echo csrf_field() @endphp

    <div class="form-group row">
        <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
        <div class="col-sm-10">
            <input type="hidden" class="form-control" name="id" id="id" value="{{ $admin->id }}">
            <input type="text" class="form-control" name="nip" id="nip" value="{{ $admin->nip }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ $admin->nama_karyawan }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                <option value="1">Pria</option>
                <option value="2">Wanita</option>
            </select>
            
        </div>
    </div>

    <div class="form-group row">
        <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="{{ $admin->no_ktp }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ $admin->no_kk }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="tanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="jml_tanggungan" id="jml_tanggungan" value="{{ $admin->jml_tanggungan }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $admin->alamat }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $admin->tgl_lahir }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="npwp" id="npwp" value="{{ $admin->npwp }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_rek" id="no_rek" value="{{ $admin->no_rek }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" value="{{ $admin->email }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="{{ $admin->no_bpjs }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label"><b>Status</b></label>
        <div class="col-sm-10">
            @if($admin->status==1)
                <input type="text" class="form-control" name="status" id="status" value="Aktif"readonly>
                    @else
                        <input type="text" class="form-control" name="status" id="status" value="Non-Aktif"readonly>
                @endif
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

    <div class="form-group row">
        <label for="lokkerja" class="col-sm-2 col-form-label"><b>Lokasi Kerja</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" value="{{ DB::table('lokasi_kerja')->where('id',$admin->id_lokasikerja)->value('nama_lokasi') }}" disabled>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Updated">
    </div>

</form>
</div>
@endsection

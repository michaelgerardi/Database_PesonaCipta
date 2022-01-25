@extends('layouts.app')

@section('content')
<form action="{{route('addkonker')}}" method="post" enctype="multipart/form-data">
    @php echo csrf_field() @endphp

    <div class="container">
        <br>
        <h3>Kontrak Kerja Karyawan</h3>
        <br>

        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>NIP</b></label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_karyawan" value="{{ $user->id }}">
                <input type="text" class="form-control" name="nip" id="nip" value="{{ DB::table('users')->where('id',$user->id)->value('nip') }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ DB::table('users')->where('id',$user->id)->value('nama_karyawan') }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="nilakontrak" class="col-sm-2 col-form-label"><b>Nilai Kontrak</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nilai_kontrak" id="nilai_kontrak" placeholder="Isi dengan nilai kontrak">
            </div>
        </div>

        <div class="form-group row">
            <label for="awalkontrak" class="col-sm-2 col-form-label"><b>Awal Kontrak</b></label>
            <div class="col-sm-10">
                <input type="date" onchange="durKontrak()" class="form-control" name="awal_kontrak" id="awal_kontrak" value="awal_kontrak">
            </div>
        </div>

        <div class="form-group row">
            <label for="akhirkontrak" class="col-sm-2 col-form-label"><b>Akhir Kontrak</b></label>
            <div class="col-sm-10">
                <input type="date" onchange="durKontrak()" class="form-control" name="akhir_kontrak" id="akhir_kontrak" value="akhir_kontrak">
            </div>
        </div>

        <div class="form-group row">
            <label for="durasikontrak" class="col-sm-2 col-form-label"><b>Durasi Kontrak</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="durasi_kontrak" id="durkon" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label"><b>Lokasi</b></label>
            <div class="col-sm-10">
                {{-- <input type="text" class="form-control" name="" id="" value="{{ DB::table('lokasi_kerja')->where('id',$user->id)->value('nama_lokasi') }}"> --}}
                <select class="form-select" aria-label="Default select example" name="id_lokasi_kerja">
                    <option selected>Pilih Lokasi Kerja Mitra Pesona Cipta</option>
                    <option value="{{ DB::table('lokasi_kerja')->value('id') }}">{{ DB::table('lokasi_kerja')->value('nama_lokasi') }}</option>
                  </select>
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

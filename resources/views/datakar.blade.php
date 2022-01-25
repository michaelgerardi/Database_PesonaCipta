@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Karyawan</h5>
                    <p class="card-text">Klik tombol di bawah untuk menambahkan akun beserta data karyawan Pesona Cipta</p>
                    <a href="{{route('formaddkar')}}" type="button" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lokasi Mitra</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat lokasi mitra Pesona Cipta</p>
                    <a href="{{route('lokkerja')}}" type="button" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Absensi</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat absensi karyawan Pesona Cipta</p>
                    <a href="" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Kontrak Kerja</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat kontrak kerja karyawan Pesona Cipta</p>
                    <a href="" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <h3>Data Karyawan</h3>
            <a href="{{route('downloaddatakar')}}" type="button" class="btn btn-primary">Download</a>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                    @foreach ($kary as $kar)
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$kar->nip}}</td>
                            <td>{{$kar->nama_karyawan}}</td>
                            @if ($kar['status']==1)
                                <td>Aktif</td>
                                @else
                                    <td>Tidak Aktif</td>
                            @endif
                            <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>
                            <td>{{DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi')}}</td>
                            <td>
                                <a href="" type="button" class="btn btn-primary">Detail</a>
                                <a href="" type="button" class="btn btn-warning">Edit</a>
                                <a href="/formkontrakkerja/{{$kar->id}}" type="button" class="btn btn-info">Kontrak</a>
                                <a href="/formpaklarin/{{$kar->id}}" type="button" class="btn btn-light">Paklarin</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
            </table>
        </div>
    </div>

</div>
@endsection

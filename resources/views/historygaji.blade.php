@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h3>History Gaji Pegawai</h3>
        <br>
    <div class="row g-3">
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
                    <h5 class="card-title">Lokasi Mitra</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat lokasi mitra Pesona Cipta</p>
                    <a href="{{route('lokkerja')}}" type="button" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row g-3">
        <div class="col-md-2">
            <input type="date" id="tanggal_gaji" name="tanggal_gaji">
        </div>

        <div class="col-md-3">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Divisi <i class="fa-solid fa-calendar-lines"></i>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Januari</a></li>
                    <li><a class="dropdown-item" href="#">Februari</a></li>
                    <li><a class="dropdown-item" href="#">Maret</a></li>
                    <li><a class="dropdown-item" href="#">April</a></li>
                </ul>
            </div>
        </div>

    </div>

        <br>
        <a href="{{route('downloaddatagaji')}}" type="button" class="btn btn-warning">Download Gaji</a>
        <br>
        <br>

        <table class="table">
            <thead class="thead">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            @foreach ($gaji as $gj)
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{DB::table('users')->where('id',$gj->id)->value('nip')}}</td>
                        <td>{{DB::table('users')->where('id',$gj->id)->value('nama_karyawan')}}</td>
                        {{-- @if (DB::table('history_gaji')->where('id',$gj->id)->value('status')==1)
                            <td>Sudah Digaji</td>
                            @else
                                <td>Belum Digaji</td>
                        @endif --}}
                        <td>{{DB::table('divisi')->where('id',$gj->id_divisi)->value('divisi') }}</td>
                        <td>{{DB::table('jabatan')->where('id',$gj->id_jabatan)->value('gol_jabatan') }}</td>

                        @if (DB::table('history_gaji')->where('id_gaji_karyawan',DB::table('data_gaji')->where('id_karyawan',$gj->id)->value('id'))->value('status')==1)
                            <td>Sudah Digaji</td>
                            @else
                            <td>Belum Digaji</td>
                        @endif
                        <td>
                            <a href="{{route('formaddgajikar',['id' => $gj->id])}}" type="button" class="btn btn-primary">Tambah</a>
                            {{--  --}}
                            @if (DB::table('history_gaji')->where('id_gaji_karyawan',DB::table('data_gaji')->where('id_karyawan',$gj->id)->value('id'))->value('status')==1)
                                <a href="{{route('formeditgajikar',['id' => $gj->id])}}" type="button" class="btn btn-warning">Edit</a>
                            @else
                                <button href="{{route('formeditgajikar',['id' => $gj->id])}}" type="button" class="btn btn-warning" disabled>Edit</button>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

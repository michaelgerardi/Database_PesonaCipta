@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Manajer --}}
        @if (Auth::user()->id_jabatan == 1)

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-masuk-tab" data-bs-toggle="tab" data-bs-target="#nav-masuk" type="button" role="tab" aria-controls="nav-masuk" aria-selected="true">Masuk</button>
                <button class="nav-link" id="nav-pulang-tab" data-bs-toggle="tab" data-bs-target="#nav-pulang" type="button" role="tab" aria-controls="nav-pulang" aria-selected="false">Pulang</button>
                <button class="nav-link" id="nav-lembur-tab" data-bs-toggle="tab" data-bs-target="#nav-lembur" type="button" role="tab" aria-controls="nav-lembur" aria-selected="false">Lembur</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-masuk" role="tabpanel" aria-labelledby="nav-masuk-tab">
                <div class="card">
                    <h5 class="card-header"><b>Absensi Jam Masuk</b></h5>
                        <div class="card-body">
                            <h5 class="card-title">Silahkan Masukan <b>Absensi Jam Masuk</b> sesuai dengan karyawan yang hadir di lokasi mitra Pesona Cipta</h5>
                            <table class="table">
                                <form action="{{route('absenmasuk')}}" method="post">
                                    {{csrf_field()}}
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Karyawan</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Jam Masuk</th>
                                            <th scope="col">Checklist</th>
                                        </tr>
                                    </thead>
                                    @foreach($karyawan as $kar)
                                    @php date_default_timezone_set('Asia/Jakarta'); @endphp
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>

                                            <td>{{$kar->nama_karyawan}}
                                            <input type="hidden" value="{{$kar->id}}" name="id[{{$loop->iteration}}]"></td>

                                            <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>

                                            <td><input type="date-now" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value={{date("d-m-Y")}} disabled></td>

                                            <td><input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value={{date("H:i:s")}} disabled></td>

                                            <td><select class="form-select" aria-label="Default select example" name="status[{{$loop->iteration}}]" id="status">
                                                <option selected>Pilih Kehadiran</option>
                                                <option value="1">Tepat Waktu</option>
                                                <option value="2">Terlambat</option>
                                                <option value="3">Cuti</option>
                                                <option value="4">Absen</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                                <button type="submit" class="btn btn-primary" name="btnMasuk">Absen</button>
                        </form>
                        </div>
                </div>

                <br>
                <div class="card">
                    <h5 class="card-header">Daftar Absensi Divisi {{DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi')}}</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama Karyawan</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Jam Masuk</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            @php date_default_timezone_set('Asia/Jakarta'); @endphp
                            @foreach($karyawan as $kar)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$kar->nip}}</td>
                                    <td>{{$kar->nama_karyawan}}</td>

                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('tanggal_masuk')}}</td>

                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('jam_masuk')}}</td>

                                    @if (DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('status')==1)
                                        <td>Tepat Waktu</td>
                                        @elseif(DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('status')==2)
                                            <td>Terlambat</td>
                                        @elseif(DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('status')==3)
                                            <td>Cuti</td>
                                        @else <td>Absen</td>
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        <div class="tab-pane fade" id="nav-pulang" role="tabpanel" aria-labelledby="nav-pulang-tab">
            <div class="tab-pane fade show active" id="nav-pulang" role="tabpanel" aria-labelledby="nav-pulang-tab">
                <div class="card">
                    <h5 class="card-header"><b>Absensi Jam Pulang</b></h5>
                        <div class="card-body">
                            <h5 class="card-title">Silahkan Masukan <b>Absensi Jam Pulang</b> sesuai dengan karyawan yang hadir di lokasi mitra Pesona Cipta</h5>
                            <table class="table">
                                <form action="#" method="post">
                                    {{csrf_field()}}
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Karyawan</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Jam Pulang</th>
                                            <th scope="col">Checklist</th>
                                        </tr>
                                    </thead>
                                    @foreach($karyawan as $kar)
                                    @php date_default_timezone_set('Asia/Jakarta'); @endphp
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>

                                            <td>{{$kar->nama_karyawan}}
                                            <input type="hidden" value="{{$kar->id}}" name="id[{{$loop->iteration}}]"></td>

                                            <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>

                                            <td><input type="date-now" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value={{date("d-m-Y")}} disabled></td>

                                            <td><input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value={{date("H:i:s")}} disabled></td>

                                            <td><select class="form-select" aria-label="Default select example" name="status[{{$loop->iteration}}]" id="status">
                                                <option selected>Pilih Kehadiran</option>
                                                <option value="1">Tepat Waktu</option>
                                                <option value="2">Terlambat</option>
                                                <option value="3">Cuti</option>
                                                <option value="4">Absen</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                                {{-- <input onClick="action.submit()" class="btn btn-primary" type="submit" value="Absen"> --}}
                                <button type="submit" class="btn btn-primary" name="btnMasuk">Absen</button>
                        </form>
                        </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="nav-lembur" role="tabpanel" aria-labelledby="nav-lembur-tab">...</div>
        </div>

        @else
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                    <th scope="col">Lembur</th>
                    <th scope="col">Cuti</th>
                </tr>
            </thead>
        </table>
        @endif
    </div>
@endsection

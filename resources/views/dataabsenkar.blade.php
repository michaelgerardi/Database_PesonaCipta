@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Manajer --}}
        @if (Auth::user()->id_jabatan == 2)

        <?php
            if(\Session::has('success')){
                $active1 = '';
                $active2 = 'active';
                $aria1 = 'false';
                $aria2 = 'true';
                $tab1 = '';
                $tab2 = 'show active';
            }else{
                    $active2 = '';
                    $active1 = 'active';
                    $aria2 = 'false';
                    $aria1 = 'true';
                    $tab2 = '';
                    $tab1 = 'show active';
            }
        ?>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link {{$active1}}" id="nav-masuk-tab" data-bs-toggle="tab" data-bs-target="#nav-masuk" type="button" role="tab" aria-controls="nav-masuk" aria-selected="{{$aria1}}">Masuk</button>
                <button class="nav-link {{$active2}}" id="nav-pulang-tab" data-bs-toggle="tab" data-bs-target="#nav-pulang" type="button" role="tab" aria-controls="nav-pulang" aria-selected="{{$aria2}}">Pulang</button>
                {{-- <button class="nav-link" id="nav-lembur-tab" data-bs-toggle="tab" data-bs-target="#nav-lembur" type="button" role="tab" aria-controls="nav-lembur" aria-selected="false">Lembur</button> --}}
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            {{-- Absen Masuk --}}
            <div class="tab-pane fade {{$tab1}}" id="nav-masuk" role="tabpanel" aria-labelledby="nav-masuk-tab">
                <div class="card">
                    <h5 class="card-header"><b>Presensi Masuk</b></h5>
                        <div class="card-body">
                            <h5 class="card-title">Silahkan Masukan <b>Presensi Masuk</b> sesuai dengan karyawan yang hadir di lokasi mitra</h5>
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

                                            {{-- <td><input type="date-now" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value={{date("d-m-Y")}} readonly></td> --}}
                                            
                                            <td><input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk[{{$loop->iteration}}]" value={{date("d-m-Y")}}></td>

                                            <td><input step="1" type="time" class="form-control" id="jam_masuk" name="jam_masuk[{{$loop->iteration}}]" value={{date("H:i:s")}}></td>

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
                                <button type="submit" class="btn btn-primary" name="btnMasuk">Submit</button>
                        </form>
                        </div>
                </div>

                <br>
                <div class="card">
                    <h5 class="card-header">Daftar Presensi Masuk Divisi <b>{{DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi')}}</b> <b><i>{{DB::table('lokasi_kerja')->where('id',DB::table('users')->where('id',$kar->id)->value('id_lokasikerja'))->value('nama_lokasi')}}</i></b></h5>
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
                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('tanggal_masuk')}}</td>

                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('jam_masuk')}}</td>

                                    @if (DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('status')==1)
                                        <td>Tepat Waktu</td>
                                        @elseif(DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('status')==2)
                                            <td>Terlambat</td>
                                        @elseif(DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('status')==3)
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

            {{-- Absen Pulang --}}
            <div class="tab-pane fade {{$tab2}}" id="nav-pulang" role="tabpanel" aria-labelledby="nav-pulang-tab">
                <div class="card">
                    <h5 class="card-header"><b>Presensi Pulang</b></h5>
                        <div class="card-body">
                            <h5 class="card-title">Silahkan Masukan <b>Presensi Pulang</b> sesuai dengan karyawan yang hadir di lokasi mitra Pesona Cipta</h5>
                            <table class="table">
                                <form action="{{route('absenpulang')}}" method="post">
                                    {{csrf_field()}}
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Karyawan</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tanggal Pulang</th>
                                            <th scope="col">Jam Pulang</th>

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

                                            {{-- <td><input type="date-now" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value={{date("d-m-Y")}} readonly></td> --}}

                                            <td><input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value={{date("d-m-Y")}}></td>

                                            <td><input step="1" type="time" class="form-control" id="jam_keluar" name="jam_keluar[{{$loop->iteration}}]" value={{date("H:i:s")}}></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                                {{-- <input onClick="action.submit()" class="btn btn-primary" type="submit" value="Absen"> --}}
                                <button type="submit" class="btn btn-primary" name="btnPulang">Submit</button>
                        </form>
                        </div>
                </div>

            <br>
                <div class="card">
                    <h5 class="card-header">Daftar Presensi Pulang Divisi {{DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi')}}</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama Karyawan</th>
                                    <th scope="col">Tanggal Pulang</th>
                                    <th scope="col">Jam Pulang</th>
                                    <th scope="col">Lembur</th>
                                </tr>
                            </thead>
                            @php date_default_timezone_set('Asia/Jakarta'); @endphp
                            @foreach($karyawan as $kar)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$kar->nip}}</td>
                                    <td>{{$kar->nama_karyawan}}</td>

                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('tanggal_masuk')}}</td>

                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('jam_keluar')}}</td>

                                    <td>{{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('lembur')}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            {{-- lembur --}}
            {{-- <div class="tab-pane fade {{$tab2}}" id="nav-lembur" role="tabpanel" aria-labelledby="nav-lembur-tab">
                <div class="card">
                    <h5 class="card-header"><b>Absensi Lembur Karyawan</b></h5>
                        <div class="card-body">
                            <h5 class="card-title">Silahkan Masukan <b>Absensi Jam Lembur</b> sesuai dengan karyawan yang lembur di lokasi mitra Pesona Cipta</h5>
                            <table class="table">
                                <form action="#" method="post">
                                    {{csrf_field()}}
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Karyawan</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Jam Masuk</th>
                                            <th scope="col">Jam Pulang</th>
                                            <th scope="col">Lembur</th>

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

                                            <td><input type="time" class="form-control" onchange="lembur()" id="jam_masuk" name="jam_masuk" value={{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('jam_masuk')}} readonly></td>

                                            <td><input type="time" class="form-control" onchange="lembur()" id="jam_keluar" name="jam_keluar" value={{DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('jam_keluar')}} readonly></td>

                                            <?php
                                                $in = DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('jam_masuk');
                                                $out = DB::table('kehadiran')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')],['tanggal_masuk',date('Y-m-d')]])->value('jam_keluar');
                                            ?>

                                            <td><input type="time" class="form-control" id="lembur" name="lembur" value="{{ (new Carbon($out))->diff(new Carbon($in))->format('%H:%I:%S') }}" readonly></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                                <button type="submit" class="btn btn-primary" name="btnLembur">Absen</button>
                        </form>
                        </div>
                </div>
            </div> --}}
        </div>

    </div>
        @else
        <h5 class="card-header">Daftar Absensi Masuk <b></b></h5>
        {{-- <form class="row" action="" style="margin-top: 10px">
            <div class="col-md-2">
                <label for="bulan" class="form-label">Tanggal: </label>
                    <input type="date" id="tanggal_masuk" value="{{date('Y-m-d')}}" name="tanggal_masuk">
            </div>

            <div class="col-md-2" style="margin-bottom: 10px">
                <button class="btn btn-primary" type="submit" style="margin-top: 8px">Search</button>
                <a href="" class="btn btn-danger" role="button" style="margin-top: 8px">Clear</a>
            </div>
        </form> --}}
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
            @foreach ($kehadiran as $keh)
            <tbody>
                <tr> 
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$keh->tanggal_masuk}}</td>
                    <td>{{$keh->jam_masuk}}</td>
                    <td>{{$keh->jam_keluar}}</td>
                    <td>{{$keh->lembur}}</td>
                    <td></td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
    </div>
@endsection

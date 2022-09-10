@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::user()->id_jabatan == 2)
    
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
        <div class="nav nav-tabs" id="nav-tabs" role="tablist">
            <button class="nav-link {{$active1}}" id="nav-masuk-tab" data-bs-toogle="tab" data-bs-target="#nav-masuk" type="button" role="tab" aria-controls="nav-masuk" aria-selected="{{$aria1}}">Masuk</button>
            <button class="nav-link {{$active2}}" id="nav-pulang-tab" data-bs-toggle="tab" data-bs-target="#nav-pulang" type="button" role="tab" aria-controls="nav-pulang" aria-selected="{{$aria2}}">Pulang</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        {{-- Presensi Masuk --}}
        <div class="tab-pane fade {{$tab1}}" id="nav-masuk" role="tabpanel" aria-labelledby="nav-masuk-tab">
            <div class="card">
                <h4 class="card-header"><b>Presensi Masuk</b></h4>
                    <div class="card-body">
                        <h5 class="card-title">Input <b>Presensi Masuk</b> sesuai karyawan yang hadir di lokasi mitra</h5>
                        <form action="{{route('presenmasuk')}}" method="post">
                            {{csrf_field()}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Karyawan</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Presensi</th>
                                </tr>
                            </thead>
                            @foreach ($karyawan as $kar)
                            @php date_default_timezone_set('Asia/Jakarta'); @endphp
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>

                                    <td>{{$kar->nama_karyawan}}
                                    <input type="hidden" value="{{$kar->id}}" name="id[{{$loop->iteration}}]"></td>

                                    <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>

                                    <td><input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk[{{$loop->iteration}}]" value={{date("d-m-Y")}}></td>

                                    <td>
                                        <select class="form-select" aria-label="Default select example" name="presen_masuk[{{$loop->iteration}}]" id="presen_masuk">
                                            <option selected>Pilih Presensi Masuk</option>
                                            <option value="1">Masuk</option>
                                            <option value="2">Cuti</option>
                                            <option value="3">Absen</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                            <button type="submit" class="btn btn-primary" name="btnMasuk">Submit Presensi</button>
                        </form>
                    </div>
            </div>

            <br>
            <div class="card">
                <h4 class="card-header">Hasil Presensi Masuk Karyawan</h4>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Presensi</th>
                            </tr>
                        </thead>
                        @php date_default_timezone_set('Asia/Jakarta') @endphp
                        @foreach ($karyawan as $kar)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>

                                <td>{{$kar->nama_karyawan}}</td>

                                <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>
                                
                                <td>{{DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('tanggal_masuk')}}</td>

                                @if (DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('presen_masuk')==1)
                                <td>Masuk</td>

                                    @elseif(DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('presen_masuk')==2)
                                    <td>Cuti</td>

                                        @elseif(DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('presen_masuk')==3)
                                        <td>Absen</td>
                                @endif

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        {{-- Presensi Pulang --}}
        <div class="tab-pane fade {{$tab2}}" id="nav-pulang" role="tabpanel" aria-labelledby="nav-pulang-tab">
            <div class="card">
                <h4 class="card-header"><b>Presensi Pulang</b></h4>
                <div class="card-body">
                    <h5 class="card-title">Input <b>Presensi Pulang</b> sesuai karyawan yang hadir di lokasi mitra</h5>
                    <table class="table">
                        <form action="{{route('presenpulang')}}" method="post">
                        {{csrf_field()}}
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Tanggal Pulang</th>
                                <th scope="col">Presensi</th>
                            </tr>
                        </thead>
                        @foreach ($karyawan as $kar)
                        @php date_default_timezone_set('Asia/Jakarta') @endphp
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>

                                <td>{{$kar->nama_karyawan}}
                                <input type="hidden" value="{{$kar->id}}" name="id[{{$loop->iteration}}]"></td>

                                <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>

                                <td><input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{date("d-m-Y")}}"></td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="presen_pulang[{{$loop->iteration}}]" id="presen_pulang">
                                        <option selected>Pilih Presensi Pulang</option>
                                        <option value="1">Tepat Waktu</option>
                                        <option value="2">Lembur</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>   
                        @endforeach
                    </table>
                    <button type="submit" class="btn btn-primary" name="btnPulang">Submit Presensi</button>
                </form>
                </div>
            </div>

            <br>
            <div class="card">
                <h5 class="card-header">Hasil Presensi Pulang Karyawan</h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Tanggal Pulang</th>
                                <th scope="col">Presensi</th>
                            </tr>
                        </thead>
                        @php date_default_timezone_set('Asia/Jakarta'); @endphp
                        @foreach($karyawan as $kar)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>

                                <td>{{$kar->nama_karyawan}}</td>

                                <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>
                                
                                <td>{{DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('tanggal_masuk')}}</td>

                                @if (DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('presen_pulang')==1)
                                <td>Tepat Waktu</td>

                                    @elseif(DB::table('presensi')->where([['id_karyawan',DB::table('users')->where('id',$kar->id)->value('id')]])->latest()->value('presen_pulang')==2)
                                    <td>Lembur</td>

                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </div>

    @endif
</div>
@endsection
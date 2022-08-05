@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <br>
        <h3>History Gaji Pegawai</h3>
        <br>

    <div class="row">

        <form action="{{route('historyGaji')}}" method="get">
            <div class="row gx-3 gy-2 align-items-center">

                <div class="col-sm">
                    <label for="divisi" class="col-sm-2 col-form-label">Tanggal Gaji:</label>
                        <input type="month" id="tanggal_gaji" value="{{date('Y-m')}}" name="tanggal_gaji">
                </div>

                <div class="col-sm">
                <label for="divisi" class="col-sm-2 col-form-label">Divisi:</label>
                <select class="form-select" aria-label=".form-select-sm example" name="divisi" id="divisi">
                    @foreach($data_divisi as $div)
                        <option value="{{$div->id}}">{{$div->divisi}}</option>
                    @endforeach
                </select>
                </div>

                <div class="col-sm">
                    <label for="status_gaji" class="col-sm-2 col-form-label">Status Penggajian:</label>
                    <select class="form-select" aria-label=".form-select-sm example" name="statgaji" id="statgaji">
                        <option value="1">Sudah Digaji</option>
                        <option value="2">Belum Digaji</option>
                    </select>
                </div>

                <div class="col-sm">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{route('historyGaji')}}" class="btn btn-warning" role="button">Clear</a>
                </div>
            </div>

            </div>
        </form>

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
                        <td>{{DB::table('divisi')->where('id',$gj->id_divisi)->value('divisi') }}</td>
                        <td>{{DB::table('jabatan')->where('id',$gj->id_jabatan)->value('gol_jabatan') }}</td>
                        @if (DB::table('history_gaji')->where('id_gaji_karyawan',DB::table('data_gaji')->where('id_karyawan',$gj->id)->value('id'))->whereMonth('tanggal_gaji',date('m'))->value('status')==1)
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

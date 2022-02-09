@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h3>History Gaji Pegawai</h3>
        <br>

        <a href="{{route('downloaddatagaji')}}" type="button" class="btn btn-warning">Download Gaji</a>
        <table class="table">
            <thead class="thead">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            @foreach ($gaji as $gj)
                <tbody>
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{DB::table('users')->where('id',$gj->id)->value('nip')}}</td>
                        <td>{{DB::table('users')->where('id',$gj->id)->value('nama_karyawan')}}</td>
                        {{-- @if (DB::table('history_gaji')->where('id',$gj->id)->value('status')==1)
                            <td>Sudah Digaji</td>
                            @else
                                <td>Belum Digaji</td>
                        @endif --}}

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
                            
                            {{--  --}}
                            <a href="/formpaklarin/{{$gj->id}}" type="button" class="btn btn-light">Paklarin</a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

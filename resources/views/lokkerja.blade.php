@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row g-2">
            <div class="col">
                <br>
                <h3>Lokasi Kerja</h3>
                <a href="{{route('formaddlokkerja')}}" type="button" class="btn btn-primary">Tambah Data +</a>
                <br>
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lokasi</th>
                            <th scope="col">Alamat Lokasi</th>
                            <th scope="col">Kode Pos</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Fax</th>
                            <th scope="col">UMR</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    @foreach ($lokkerja as $lk)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$lk->nama_lokasi}}</td>
                                <td>{{$lk->alamat_lokasi}}</td>
                                <td>{{$lk->kode_pos}}</td>
                                <td>{{$lk->no_telp}}</td>
                                <td>{{$lk->fax}}</td>
                                <td>{{$lk->umr}}</td>
                                <td>
                                    <a href="{{route('formeditlokkerja',['id' => $lk->id])}}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="{{route("delloker")}}" type="button" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection

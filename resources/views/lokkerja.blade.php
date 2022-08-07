@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h3>Lokasi Mitra
                    <a href="{{route('formaddlokkerja')}}" type="button" class="btn btn-primary" style="margin-left:1000px">Tambah Mitra</a>
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mitra</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kode Pos</th>
                            <th scope="col">Telepon</th>
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
                                <td>Rp{{$lk->umr}},-</td>
                                <td>
                                    <a href="{{route('formeditlokkerja',['id' => $lk->id])}}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="{{route('delloker',['id'=>$lk->id])}}" type="button" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection

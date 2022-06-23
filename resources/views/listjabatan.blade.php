@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h3><b>List Jabatan</b></h3>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Golongan Jabatan</th>
                    <th scope="col">Persentase</th>
                    <th scope="col">Opsi</th> 
                </tr>
            </thead>
            @foreach ($jabat as $jb)
            <tbody>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$jb->gol_jabatan}}</td>
                    <td>{{$jb->persentase}}%</td>
                    <td>
                        <a href="#" type="button" class="btn btn-warning">Edit</a>
                        <a href="#" type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>

            <div class="modal-fade" id="exampleModal{{$loop->iteration}}">
                <div class="modal-dialog modal-dialog-scrollable" tabindex="-1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </table>
    </div>
@endsection

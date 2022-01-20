@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h3>Data Karyawan</h3>
        <br>

        <a href="{{route('downloaddatakar')}}" type="button" class="btn btn-primary">Download</a>
        <br>
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
                        <td>
                            <a href="" type="button" class="btn btn-primary">Detail</a>
                            <a href="" type="button" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
        </table>
    </div>
@endsection

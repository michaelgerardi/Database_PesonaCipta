@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h3><b>List Jabatan</b></h3>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Tambah +</button>
        <br>
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
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$loop->iteration}}">
                            Edit
                          </button>
                        <a href="#" type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>

            {{-- Tambah Jabatan --}}
            <div class="modal fade" id="exampleModal1">
                <div class="modal-dialog" tabindex="-1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Jabatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('addjabat')}}" method="POST" enctype="multipart/form-data">
                                @php echo csrf_field() @endphp
                            <div class="form-group row">
                                <label for="gol_jabatan" class="col-sm-2 col-form-label"><b>Golongan Jabatan</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="gol_jabatan" id="gol_jabatan" placeholder="Isi dengan golongan jabatan baru">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="persentase" class="col-sm-2 col-form-label"><b>Persentase</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="persentase" id="persentase" placeholder="Masukan persentase gaji sesuai jabatan">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Jabatan --}}
            <div class="modal fade" id="exampleModal2{{$loop->iteration}}">
                <div class="modal-dialog" tabindex="-1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Jabatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('upjabatan')}}" method="POST" enctype="multipart/form-data">
                                @php echo csrf_field() @endphp
                            <div class="form-group row">
                                <label for="gol_jabatan" class="col-sm-2 col-form-label"><b>Golongan Jabatan</b></label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id" value="{{$jb->id}}">
                                    <input type="text" class="form-control" name="gol_jabatan" id="gol_jabatan" value="{{$jb->gol_jabatan}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="persentase" class="col-sm-2 col-form-label"><b>Persentase</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="persentase" id="persentase" value="{{$jb->persentase}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </table>
    </div>
@endsection

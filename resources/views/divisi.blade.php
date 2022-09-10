@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3><b>List Jabatan</b>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDiv" style="margin-left: 1000px">Tambah Divisi</button>
    </h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Divisi</th>
                <th scope="col">Persentase</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        @foreach ($divisi as $div)
        <tbody>
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$div->divisi}}</td>
                <td>{{$div->persen}} %</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalEditDivisi{{$loop->iteration}}">
                        Edit
                      </button>
                    {{-- <a href="#" type="button" class="btn btn-danger">Delete</a> --}}
                </td>
            </tr>
        </tbody>

        {{-- Tambah Jabatan --}}
        <div class="modal fade" id="exampleModalDiv">
            <div class="modal-dialog" tabindex="-1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('addDiv')}}" method="POST" enctype="multipart/form-data">
                            @php echo csrf_field() @endphp
                        <div class="form-group row">
                            <label for="divisi" class="col-sm-2 col-form-label"><b>Nama Divisi</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Isi dengan nama divisi baru">
                            </div>

                            <label for="divisi" class="col-sm-2 col-form-label"><b>Persentase</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="persen" id="persen" placeholder="Isi dengan nilai persentase divisi">
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
        <div class="modal fade" id="exampleModalEditDivisi{{$loop->iteration}}">
            <div class="modal-dialog" tabindex="-1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('upDivisi')}}" method="POST" enctype="multipart/form-data">
                            @php echo csrf_field() @endphp
                        <div class="form-group row">
                            <label for="gol_jabatan" class="col-sm-2 col-form-label"><b>Nama Divisi</b></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" value="{{$div->id}}">
                                <input type="text" class="form-control" name="divisi" id="divisi" value="{{$div->divisi}}">
                            </div>

                            <label for="gol_jabatan" class="col-sm-2 col-form-label"><b>Persentase</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="persen" id="persen" value="{{$div->persen}}">
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
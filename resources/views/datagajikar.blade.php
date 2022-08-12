@extends('layouts.app')

@section('content')
    <div class="container">
    <br>
    <h3>Data Gaji {{Auth::user()->nama_karyawan}}</h3>
    <br>

    <table class="table">
        <thead class="thead">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Gaji</th>
                <th scope="col">Total Gaji</th>
                <th scope="col">Status Gaji</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        @foreach ($histogaji as $hj)
            <tbody>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$hj->tanggal_gaji}}</td>

                    <td>Rp 
                        {{-- {{DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_pokok')+DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_tunjangan')+DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('thr')-DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_pokok')}} --}}
                        {{DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_pokok')}} ,-
                    </td>
                    @if ($hj->status=1)
                        <td>Sudah Digaji</td>
                        @else <td>Belum Digaji</td>
                    @endif
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$loop->iteration}}">Detail</button>
                        <a href="{{route('downloadgaji', ['id_gaji' => $hj->id_gaji_karyawan, 'id_his' => 'SearchController@search'])}}" type="button" class="btn btn-warning">Download</a>
                    </td>
                </tr>
            </tbody>

            <div class="modal fade" id="exampleModal{{$loop->iteration}}">
                <div class="modal-dialog  modal-dialog-scrollable" tabindex="-1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Gaji</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group row">
                                <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id" value="{{ $hj->id }}">
                                    <input type="text" class="form-control" name="nip" id="nip" value="{{DB::table('users')->where('id',$id_karyawan)->value('nip')}}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ DB::table('users')->where('id',$id_karyawan)->value('nama_karyawan') }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tglgaji" class="col-sm-2 col-form-label"><b>Tanggal Gaji</b></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_gaji" id="tanggal_gaji" value="{{ $hj['tanggal_gaji'] }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gajipokok" class="col-sm-2 col-form-label"><b>Gaji Pokok</b></label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_gaji_karyawan" value="{{ $hj->id }}">
                                    <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" value="{{DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_pokok')}}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bpjs" class="col-sm-2 col-form-label"><b>BPJS</b></label>
                                <div class="col-sm-10">
                                    <input type="text" onchange="myFunction()" class="form-control" name="bpjs" id="bpjs" placeholder="Isi dengan BPJS" value="{{DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('bpjs')}}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="totalgaji" class="col-sm-2 col-form-label"><b>Total Gaji</b></label>
                                <div class="col-sm-10">
                                    {{-- <input type="text" class="form-control" name="valtot" id="valtot" value="{{DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_pokok')+DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_tunjangan')+DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('thr')-DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('bpjs')}}" disabled> --}}
                                    <input type="text" class="form-control" value="{{DB::table('data_gaji')->where('id',$hj->id_gaji_karyawan)->value('gaji_pokok')}}" disabled>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <a href="/downloadgaji/{{$hj->id_gaji_karyawan}}" type="button" class="btn btn-warning">Download</a> --}}
                        </div>
                    </div>
                </div>
        @endforeach
    </table>
    </div>


    </div>

@endsection

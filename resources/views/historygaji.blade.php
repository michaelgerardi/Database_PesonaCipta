@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-bottom: 10px">Penggajian Karyawan</h3>
    </div>

        <div class="container" style="margin-bottom: 10px">
        <form class=row action="{{route('historyGaji')}}" method="get">
            <div class="col-md-2">
                <label for="bulan" class="form-label">Bulan: </label>
                    <input type="month" id="tanggal_gaji" value="{{date('Y-m')}}" name="tanggal_gaji">
            </div>

            <div class="col-md-2">
                <label for="divisi" class="form-label">Divisi:</label>
                <select class="form-select" aria-label=".form-select-sm example" name="divisi" id="divisi">
                    @foreach($data_divisi as $div)
                        <option value="{{$div->id}}">{{$div->divisi}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="lokasi" class="form-label">Lokasi Mitra:</label>
                <select class="form-select" aria-label=".form-select-sm example" name="nama_lokasi" id="nama_lokasi">
                    @foreach ($lokkasikerja as $lokk)
                        <option value="{{$lokk->id}}">{{$lokk->nama_lokasi}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="status_gaji" class="form-label">Status Penggajian:</label>
                    <select class="form-select" aria-label=".form-select-sm example" name="statgaji" id="statgaji">
                    <option value="1">Sudah Digaji</option>
                    <option value="2">Belum Digaji</option>
                    </select>
            </div>

            <div class="col-md-2">
                <label class="form-label" for="option"></label>
                <br>
                <button class="btn btn-primary" type="submit" style="margin-top: 8px">Search</button>
                <a href="{{route('historyGaji')}}" class="btn btn-danger" role="button" style="margin-top: 8px">Clear</a>
            </div>
        </form>
        </div>
        
        <div class="container-fluid">
        {{-- <a href="{{route('downloaddatagaji')}}" type="button" class="btn btn-warning" style="margin-bottom: 10px">Download Gaji</a> --}}
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
                        <td>{{DB::table('divisi')->where('id',$gj->id_divisi)->value('divisi')}}</td>
                        <td>{{DB::table('jabatan')->where('id',$gj->id_jabatan)->value('gol_jabatan') }}</td>
                        @if (DB::table('history_gaji')->whereYear('tanggal_gaji',$pieces[0])->whereMonth('tanggal_gaji',$pieces[1])->whereIn('id_gaji_karyawan',DB::table('data_gaji')->where('id_karyawan',$gj->id)->pluck('id'))->value('status')==1)
                            <td>Sudah Digaji</td>
                            @else
                            <td>Belum Digaji</td>
                        @endif
                        <td>
                            @if(DB::table('history_gaji')->whereYear('tanggal_gaji',$pieces[0])->whereMonth('tanggal_gaji',$pieces[1])->whereIn('id_gaji_karyawan',DB::table('data_gaji')->where('id_karyawan',$gj->id)->pluck('id'))->value('status')==1)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDetailGaji{{$loop->iteration}}">Detail</button>
                            @else
                                <a href="{{route('formaddgajikar',['id' => $gj->id])}}" type="button" class="btn btn-primary">Tambah</a>
                            @endif
                            {{--  --}}
                            {{-- @if (DB::table('history_gaji')->where('id_gaji_karyawan',DB::table('data_gaji')->where('id_karyawan',$gj->id)->value('id'))->value('status')==1)
                                <a href="{{route('formeditgajikar',['id' => $gj->id])}}" type="button" class="btn btn-warning">Edit</a>
                            @else
                                <button href="{{route('formeditgajikar',['id' => $gj->id])}}" type="button" class="btn btn-warning" disabled>Edit</button>
                            @endif --}}
                        </td>
                    </tr>
                </tbody>
                <div class="modal fade" id="exampleModalDetailGaji{{$loop->iteration}}">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"  tabindex="-1">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Gaji</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="container">
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="id" value="{{ $gj->id }}">
                                        <input type="text" class="form-control" name="nip" id="nip" value="{{DB::table('users')->where('id',$gj->id)->value('nip')}}" disabled>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{DB::table('users')->where('id',$gj->id)->value('nama_karyawan')}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="divisi" id="divisi" value="{{DB::table('divisi')->where('id',$gj->id_divisi)->value('divisi')}}" disabled>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-2 col-form-label"><b>Jabatan</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="gol_jabatan" id="gol_jabatan" value="{{DB::table('jabatan')->where('id',$gj->id_jabatan)->value('gol_jabatan')}}" disabled>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="masajabatan" class="col-sm-2 col-form-label"><b>Lokasi Kerja</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lokasikkerja" id="lokkasikera" value="{{DB::table('lokasi_kerja')->where('id',$gj->id_lokasikerja)->value('nama_lokasi')}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="masajabatan" class="col-sm-2 col-form-label"><b>Iuran BPJS</b></label>
                                    <div class="col-sm-10">
                                        {{-- <input type="hidden" class="form-control" name="id_karyawan" value="{{$gj->id}}"> --}}
                                        <input type="text" class="form-control" name="bpjs" id="bpjs" value="{{DB::table('data_gaji')->where('id_karyawan',$gj->id)->value('bpjs')}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="masajabatan" class="col-sm-2 col-form-label"><b>Total Gaji</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" value="{{DB::table('data_gaji')->where('id_karyawan',$gj->id)->value('gaji_pokok')}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>
@endsection

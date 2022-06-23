@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Karyawan</h5>
                    <p class="card-text">Klik tombol di bawah untuk menambahkan akun beserta data karyawan Pesona Cipta</p>
                    <a href="{{route('formaddkar')}}" type="button" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lokasi Mitra</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat lokasi mitra Pesona Cipta</p>
                    <a href="{{route('lokkerja')}}" type="button" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Absensi</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat absensi karyawan Pesona Cipta</p>
                    <a href="" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Jabatan</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat jabatan karyawan Pesona Cipta</p>
                    <a href="{{route('listjabatan')}}" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <h3>Data Karyawan</h3>
            <a href="{{route('downloaddatakar')}}" type="button" class="btn btn-primary">Download</a>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Divisi</th>
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
                            <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>
                            <td>{{DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi')}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$loop->iteration}}">
                                    Detail
                                  </button>

                                <a href="" type="button" class="btn btn-warning">Edit</a>
                                <a href="/formkontrakkerja/{{$kar->id}}" type="button" class="btn btn-info">Kontrak</a>
                                <a href="/formpaklarin/{{$kar->id}}" type="button" class="btn btn-light">Paklarin</a>
                            </td>
                        </tr>
                    </tbody>

                    <div class="modal fade" id="exampleModal1{{$loop->iteration}}">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" tabindex="-1">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Data Karyawan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group row">
                                        <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control" name="id" value="{{ $kar->id }}">
                                            <input type="text" class="form-control" name="nip" id="nip" value="{{ $kar->nip }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="namakar" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ $kar->nama_karyawan }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jk" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
                                        <div class="col-sm-10">
                                            @if($kar->jenis_kelamin==1)
                                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="Pria"readonly>
                                                @else
                                                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="Wanita"readonly>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="{{ $kar->no_ktp }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ $kar->no_kk }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jmltanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jml_tanggungan" id="jml_tanggungan" value="{{ $kar->jml_tanggungan }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $kar->alamat }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="umur" class="col-sm-2 col-form-label"><b>Umur</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="umur" id="umur" value="{{ $kar->umur }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $kar->tgl_lahir }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="npwp" id="npwp" value="{{ $kar->npwp }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_rek" id="no_rek" value="{{ $kar->no_rek }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" id="email" value="{{ $kar->no_rek }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="{{ $kar->no_bpjs }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="masajabatan" class="col-sm-2 col-form-label"><b>Masa Jabatan</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="masa_jabatan" id="masa_jabatan" value="{{ $kar->masa_jabatan }} Tahun" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="masajabatan" class="col-sm-2 col-form-label"><b>Masa Jabatan</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="masa_jabatan" id="masa_jabatan" value="{{ DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan') }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="divisi" id="divisi" value="{{ DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi') }}" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="/formpaklarin/{{$kar->id}}" type="button" class="btn btn-primary">Download Paklarin</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </table>

        </div>
    </div>

</div>
@endsection

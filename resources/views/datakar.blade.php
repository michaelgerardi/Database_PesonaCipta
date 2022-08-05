@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card">
                @if (Auth::user()->id_jabatan == 4)
                <div class="card-body">
                    <h5 class="card-title">Tambah Karyawan</h5>
                    <p class="card-text">Klik tombol di bawah untuk menambahkan akun beserta data karyawan Pesona Cipta</p>
                    {{-- <a href="{{route('formaddkar')}}" type="button" class="btn btn-primary">Tambah</a> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalKar">Tambah</button>
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
                    <h5 class="card-title">List Jabatan</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat jabatan karyawan Pesona Cipta</p>
                    <a href="{{route('listjabatan')}}" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->id_jabatan == 1)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Absensi</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat absensi karyawan Pesona Cipta</p>
                    <a href="" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br>

    <div class="modal fade" id="exampleModalKar">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"  tabindex="-1">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('addDataKar') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="container">
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label"><b>NIP</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('nip') is-invalid @enderror" name="nip" id="nip" placeholder="Isi dengan NIP">
                                @error('nip')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('nama_karyawan') is-invalid @enderror" name="nama_karyawan" id="nama_karyawan" placeholder="Isi dengan nama karyawan">
                                @error('nama_karyawan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="1">Pria</option>
                                    <option value="2">Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="noktp" class="col-sm-2 col-form-label"><b>Nomor KTP</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" placeholder="Isi dengan nomor ktp karyawan">
                                @error('no_ktp')
                                    <div class="invalid-fluid">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Isi dengan nomor kartu keluarga">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('jml_tanggungan') is-invalid @enderror" name="jml_tanggungan" id="jml_tanggungan" placeholder="Isi dengan jumlah tanggungan karyawan, misal 3">
                                @error('jml_tanggungan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" placeholder="Isi dengan alamat karyawan sesuai dengan KTP"></textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error ('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Isi dengan tanggal lahir">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-sm-2 col-form-label"><b>Umur</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('umr') is-invalid @enderror" name="umur" id="umur" placeholder="Isi dengan umur karyawan">
                                @error('umr')
                                    <div class="invalid-submit">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('npwp') is-invalid @enderror" name="npwp" id="npwp" placeholder="Isi dengan nomor NPWP karyawan">
                                @error('npwp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('no_rek') is-invalid @enderror" name="no_rek" id="no_rek" placeholder="Isi dengan nomor rekening karyawan">
                                @error('no_rek')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('email') is-invalid @enderror" name="email" id="email" placeholder="Isi dengan email karyawan">
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('no_bpjs') is-invalid @enderror" name="no_bpjs" id="no_bpjs" placeholder="Isi dengan nomor BPJS karyawan">
                                @error('no_bpjs')
                                    <div class="invalid-feedbac">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('password') is-invalid @enderror" name="password" id="password" placeholder="Isi dengan password 123456789">
                                @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label"><b>Status</b></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="status" id="status">
                                    <option selected>Pilih Jenis Status Karyawan</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="masajabatan" class="col-sm-2 col-form-label"><b>Masa Jabatan</b></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="masa_jabatan" id="masa_jabatan">
                                    <option selected>Pilih Masa Jabatan</option>
                                    <option value="1">1 Tahun</option>
                                    <option value="2">2 Tahun</option>
                                    <option value="3">3 Tahun</option>
                                    <option value="4">4 Tahun</option>
                                    <option value="5">5 Tahun</option>
                                    <option value="6">Masa Jabatan Hingga Pensiun</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-2 col-form-label"><b>Golongan Jabatan</b></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="id_jabatan" id="id_jabatan">
                                    <option selected>Pilih Golongan Jabatan</option>
                                    <option value="1">Manajer</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Karyawan</option>
                                    <option value="4">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="id_divisi" id="id_divisi">
                                    <option selected>Pilih Divisi Karyawan</option>
                                    <option value="1">Keuangan</option>
                                    <option value="2">Human Resource</option>
                                    <option value="3">Lapangan</option>
                                    <option value="4">Staff</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Create">
                            </div>
                        </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 style="margin-top: 10px">Data Karyawan</h3>
            <a href="{{route('downloaddatakar')}}" type="button" class="btn btn-primary" style="margin-bottom:10px;">Download</a>
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
                                <a href="{{route('formeditadmin',['id' => $kar->id])}}" type="button" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    </tbody>

                    {{-- MODAL DETAIL KARYAWAN --}}
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
                                        <label for="status" class="col-sm-2 col-form-label"><b>Status</b></label>
                                        <div class="col-sm-10">
                                            @if($kar->status==1)
                                            <input type="text" class="form-control" name="status" id="status" value="Aktif"readonly>
                                                @else
                                                    <input type="text" class="form-control" name="status" id="status" value="Non-Aktif"readonly>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gol_jabatan" class="col-sm-2 col-form-label"><b>Jabatan</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="gol_jabatan" id="gol_jabatan" value="{{ DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan') }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="divisi" class="col-sm-2 col-form-label"><b>Divisi</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="divisi" id="divisi" value="{{ DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi') }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lokkerja" class="col-sm-2 col-form-label"><b>Lokasi Kerja</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="lokasi_kerja" id="lokasi_kerja" value="{{ DB::table('lokasi_kerja')->where('id',DB::table('users')->where('id',$kar->id)->value('id_lokasikerja'))->value('nama_lokasi') }}" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    {{-- <a href="/formpaklarin/{{$kar->id}}" type="button" class="btn btn-primary">Download Paklarin</a> --}}
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

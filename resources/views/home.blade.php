@extends('layouts.app')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container">
    @if (Auth::user()->id_jabatan == 4)
    <!-- <figure class="highcharts-figure">
        <div id="container"></div> 
    </figure> -->
    <h3 style="margin-bottom: 30px;"><b>Selamat Bekerja {{Auth::user()->nama_karyawan}}</b></h3>

    <!-- IMAGE SLIDER -->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-bottom: 30px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="image/test.png" class="d-block w-100" alt="first_slide">
                </div>
                <div class="carousel-item">
                <img src="image/img2.png" class="d-block w-100" alt="second_slide">
                </div>
                <div class="carousel-item">
                <img src="image/img3.png" class="d-block w-100" alt="third_slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>

    <div class="container">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Karyawan</h5>
                    <p class="card-text">Klik tombol di bawah untuk menambahkan akun beserta data karyawan Pesona Cipta</p>
                    <!-- <a href="{{route('formaddkar')}}" type="button" class="btn btn-primary">Tambah</a> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Tambah</button>
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

    <div class="modal fade" id="exampleModal2">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"  tabindex="-1">
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
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP terisi secara otomatis">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Isi dengan nama karyawan">
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
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Isi dengan nomor ktp karyawan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Isi dengan nomor kartu keluarga">
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
                            <label for="tanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jml_tanggungan" id="jml_tanggungan" placeholder="Isi dengan jumlah tanggungan karyawan, misal 3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Isi dengan alamat karyawan sesuai dengan KTP"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Isi dengan tanggal lahir">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-sm-2 col-form-label"><b>Umur</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="umur" id="umur" placeholder="Isi dengan umur karyawan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Isi dengan nomor NPWP karyawan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="Isi dengan nomor rekening karyawan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Isi dengan email karyawan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" placeholder="Isi dengan nomor BPJS karyawan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Isi dengan password default 123456789">
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

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Create">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3>Data Karyawan</h3>
            <a href="{{route('downloaddatakar')}}" type="button" class="btn btn-primary" style="margin-bottom: 20px;">Download</a>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Karyawan</th>
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
                            <td>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$kar->id)->value('id_jabatan'))->value('gol_jabatan')}}</td>
                            <td>{{DB::table('divisi')->where('id',DB::table('users')->where('id',$kar->id)->value('id_divisi'))->value('divisi')}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$loop->iteration}}">
                                    Detail
                                  </button>

                                <a href="" type="button" class="btn btn-warning">Edit</a>
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

        @elseif (Auth::user()->id_jabatan == 2)
            <br>
            <div class="container">
                <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="image/test.png" class="d-block w-100" alt="...">
                        </div>
                            <div class="carousel-item">
                            <img src="image/test.png" class="d-block w-100" alt="...">
                            </div>
                                <div class="carousel-item">
                                <img src="image/test.png" class="d-block w-100" alt="...">
                                </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div> -->
            <br>
            <h3><b>Selamat Datang {{Auth::user()->nama_karyawan}}</b></h3>
            <br>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Absensi</h5>
                            <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman absensi</p>
                            @if (Auth::user()->id_jabatan == 1)
                                <a href="{{route('dataabsenkar')}}" type="button" class="btn btn-primary">Lihat</a>
                                @else
                                <a href="{{route('dataabsenkars')}}" type="button" class="btn btn-primary">Lihat</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

                @elseif (Auth::user()->id_jabatan == 1)

                <h3><b>Selamat Datang {{Auth::user()->nama_karyawan}}</b></h3>
                
                <div class="container-fluid">
                <div class="row-g-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Gaji {{Auth::user()->nama_karyawan}}</h5>
                                <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman penggajian {{Auth::user()->nama_karyawan}}</p>
                                <a href="{{route('tabledatagajikar')}}" type="button" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Data Gaji Karyawan</h5>
                                    <a href="{{route('historyGaji')}}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Rawon</h5>
                                <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman anjing rawon</p>
                                <a href="" type="button" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif
</div>
<script>
    Highcharts.chart('container', {

chart: {
    type: 'column'
},

title: {
    text: 'Dashboard Penggajian Bulan'
},

xAxis: {
    categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
},

yAxis: {
    allowDecimals: false,
    min: 0,
    title: {
        text: 'Number of fruits'
    }
},

tooltip: {
    formatter: function () {
        return '<b>' + this.x + '</b><br/>' +
            this.series.name + ': ' + this.y + '<br/>' +
            'Total: ' + this.point.stackTotal;
    }
},

plotOptions: {
    column: {
        stacking: 'normal'
    }
},

series: [{
    name: 'John',
    data: [5, 3, 4, 7, 2],
    stack: 'male'
}, {
    name: 'Joe',
    data: [3, 4, 4, 2, 5],
    stack: 'male'
}, {
    name: 'Jane',
    data: [2, 5, 6, 2, 1],
    stack: 'female'
}, {
    name: 'Janet',
    data: [3, 0, 4, 4, 3],
    stack: 'female'
}]
});
</script>

@endsection

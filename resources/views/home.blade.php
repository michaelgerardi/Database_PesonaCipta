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
    <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-bottom: 30px;">
            <div class="carousel-inner">
                <div class="carousel-item active align-items-center flex-column p-4">
                <img src="image/test.png" class="d-block w-100" alt="first_slide">
                </div>
                <div class="carousel-item align-items-center flex-column p-4">
                <img src="image/img2.png" class="d-block w-100" alt="second_slide">
                </div>
                <div class="carousel-item align-items-center flex-column p-4">
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

        <!-- <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Jabatan</h5>
                    <p class="card-text">Klik tombol di bawah untuk melihat jabatan karyawan Pesona Cipta</p>
                    <a href="{{route('listjabatan')}}" type="button" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div> -->
    </div>
    <br>

    <!-- MODAL ADD KARYAWAN -->
    <div class="modal fade" id="exampleModal2">
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
                                <input type="text" class="form-control @error ('nip') is-invalid @enderror" name="nip" id="nip" placeholder="Isi dengan NIP" maxlength="13" value="{{old('nip')}}">
                                @error('nip')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namakaryawan" class="col-sm-2 col-form-label"><b>Nama Karyawan</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('nama_karyawan') is-invalid @enderror" name="nama_karyawan" id="nama_karyawan" placeholder="Isi dengan nama karyawan" maxlength="30" value="{{old('nama_karyawan')}}">
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
                                <input type="text" class="form-control @error ('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" placeholder="Isi dengan nomor ktp karyawan" maxlength="17" value="{{old('no_ktp')}}">
                                @error('no_ktp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nokk" class="col-sm-2 col-form-label"><b>Nomor KK</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Isi dengan nomor kartu keluarga" maxlength="17" value="{{old('no_kk')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggungan" class="col-sm-2 col-form-label"><b>Jumlah Tanggungan</b></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error ('jml_tanggungan') is-invalid @enderror" name="jml_tanggungan" id="jml_tanggungan" placeholder="Isi dengan jumlah tanggungan karyawan, misal 3" value="{{old('jml_tanggungan')}}">
                                @error('jml_tanggungan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" placeholder="Isi dengan alamat karyawan sesuai dengan KTP">{{old('alamat')}}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgllahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error ('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Isi dengan tanggal lahir" value="{{old('tgl_lahir')}}">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npwp" class="col-sm-2 col-form-label"><b>NPWP</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('npwp') is-invalid @enderror" name="npwp" id="npwp" placeholder="Isi dengan nomor NPWP karyawan" maxlength="16" value="{{old('npwp')}}">
                                @error('npwp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="norek" class="col-sm-2 col-form-label"><b>Nomor Rekening</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('no_rek') is-invalid @enderror" name="no_rek" id="no_rek" placeholder="Isi dengan nomor rekening karyawan" minlength="12" maxlength="17" value="{{old('no_rek')}}">
                                @error('no_rek')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('email') is-invalid @enderror" name="email" id="email" placeholder="Isi dengan email karyawan" value="{{old('email')}}">
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nobpjs" class="col-sm-2 col-form-label"><b>Nomor BPJS</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('no_bpjs') is-invalid @enderror" name="no_bpjs" id="no_bpjs" placeholder="Isi dengan nomor BPJS karyawan" maxlength="14" value="{{old('no_bpjs')}}">
                                @error('no_bpjs')
                                    <div class="invalid-feedbac">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error ('password') is-invalid @enderror" name="password" id="password" placeholder="Isi dengan password 123456789" maxlength="15" value="{{old('password')}}">
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
                                    <option value="1">Keamanan</option>
                                    <option value="2">Kebersihan</option>
                                    <option value="3">Transportasi</option>
                                    <option value="4">Support Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="masajabatan" class="col-sm-2 col-form-label"><b>Lokasi Kerja</b></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="id_lokasikerja" id="id_lokasikerja">
                                    <option selected>Lokasi Kerja</option>
                                    @foreach($lokasi as $loks)
                                    <option value="{{$loks->id}}">{{$loks->nama_lokasi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Create">
                            </div>
                        </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
            </div>
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
        </div>

                @elseif (Auth::user()->id_jabatan == 1)

                <h3><b>Selamat Datang {{Auth::user()->nama_karyawan}}</b></h3>
                <div class="container">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-bottom: 30px;">
                        <div class="carousel-inner">
                            <div class="carousel-item active align-items-center flex-column p-4">
                            <img src="image/test.png" class="d-block w-100" alt="first_slide">
                            </div>
                            <div class="carousel-item align-items-center flex-column p-4">
                            <img src="image/img2.png" class="d-block w-100" alt="second_slide">
                            </div>
                            <div class="carousel-item align-items-center flex-column p-4">
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
                </div>
                <div class="container">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card">
                            <!-- <img src="" class="card-img-top" alt=""> -->
                            <div class="card-body">
                                <h5 class="card-title">Penggajian Karyawan</h5>
                                <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman penggajian karyawan</p>
                                <a href="{{route('historyGaji')}}" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Karyawan</h5>
                                <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman data karyawan</p>
                                <a href="" type="button" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Gaji {{Auth::user()->nama_karyawan}}</h5>
                                <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman data gaji anda</p>
                                <a href="{{route('tabledatagajikar')}}" type="button" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            @elseif (Auth::user()->id_jabatan == 3)
            <div class="container">
                <h3><b>Selamat Datang {{Auth::user()->nama_karyawan}}</b></h3>
            </div>
            <div class="container">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Gaji {{Auth::user()->nama_karyawan}}</h5>
                            <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman data gaji anda</p>
                            <a href="{{route('tabledatagajikar')}}" type="button" class="btn btn-primary">Pilih</a>
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

@extends('layouts.app')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container">
    @if (Auth::user()->id_jabatan == 4)
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
    <br>
        <div class="">
            <div class="col-md-3">row justify-content g-3
                <div class="card" style="width: 18rem;">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Data Gaji Karyawan</h5>
                            <a href="{{route('historyGaji')}}" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Download Data Karyawan</h5>
                            <a href="{{ route('downloaddatakar') }}" class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Download Data Penggajian</h5>
                            <a href="/#" class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="image/People_Logo.png" class="card-img-top" style="width:90px; height:90px">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Karyawan</h5>
                        <p class="card-text">Klik tombol "Tambah" untuk menambahkan akun karyawan baru</p>
                            <a href="/addkaryawan" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
        </div> --}}
        @else
            <br>
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
                </div>
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Gaji {{Auth::user()->nama_karyawan}}</h5>
                            <p class="card-text">Klik tombol di bawah untuk masuk ke dalam halaman penggajian {{Auth::user()->nama_karyawan}}</p>
                            <a href="{{route('tabledatagajikar')}}" type="button" class="btn btn-primary">Lihat</a>
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

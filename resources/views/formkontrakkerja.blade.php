@extends('layouts.app')

@section('content')
<form action="{{route('')}}" method="post" enctype="multipart/form-data">
    @php echo csrf_field() @endphp

    <div class="container">
        <br>
        <h3>Kontrak Kerja Karyawan</h3>
    </div>
</form>
@endsection
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
@foreach($judul as $jd)
<h1 class="h3 mb-2 text-gray-800">{{ $jd->judul }} / Level {{ $jd->level }} </h1>
@endforeach

<!-- Detail Materi -->
@foreach ($sub_judul as $sub)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modul {{ $sub }}</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <input id="judul_materi" type="text" class="form-control" value="{!! $isi_materi[$sub] !!}" readonly>
        </div>

        <div class="form-group">
            <a href="{{ url('progres_materi') }}" class="btn btn-secondary ">Kembali</a>
        </div>
    </div>
</div>
@endforeach
<br>

</div>
<!-- /.container-fluid -->
@endsection
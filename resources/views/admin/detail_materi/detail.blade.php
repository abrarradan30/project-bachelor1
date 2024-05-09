@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Materi</h1>

<!-- Detail Materi -->
<div class="card shadow mb-4">
    @foreach ($detail_materi as $dm)
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Materi</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="judul_materi">Judul Materi :</label>
            <input id="judul_materi" type="text" class="form-control" value="{{ $dm->judul_materi }}" readonly>
        </div>

        <div class="form-group">
            <label for="sub_judul">Sub Judul :</label>
            <input id="sub_judul" type="text" class="form-control" value="{{ $dm->sub_judul }}" readonly>
        </div>

        <div class="form-group">
            <label for="isi_materi">Isi Materi :</label>
            <!-- <textarea id="isi_materi" cols="30" rows="10" class="form-control" readonly>{{ $dm->isi_materi }}</textarea> -->
            <div>
                {!! $dm->isi_materi !!}
            </div>
        </div>

        <div class="form-group">
            <a href="{{ url('detail_materi') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
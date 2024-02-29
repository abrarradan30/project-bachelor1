@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
@foreach($forum_diskusi as $fd) 
<h1 class="h3 mb-2 text-gray-800">Detail Diskusi</h1>

<!-- Detail Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Diskusi</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="nama">Nama :</label>
            <input id="nama" type="text" class="form-control" value="{{ $data->nama }}" readonly>
        </div>

        <div class="form-group">
            <label for="judul_materi">Judul Materi :</label>
            <input id="judul_materi" type="text" class="form-control" value="{{ $data->judul_materi }}" readonly>
        </div>

        <div class="form-group">
            <label for="">Pertanyaan :</label>
            <textarea id="pertanyaan" cols="30" rows="10" class="form-control" readonly>{{ $data->pertanyaan }}</textarea>
        </div>

        <div class="form-group">
            <label>Status Diskusi:</label>
            <input type="text" class="form-control" value="{{ $data->status_diskusi }}" readonly>
        </div>

        <div class="form-group">
            <a href="{{ url('forum_diskusi') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endforeach
</div>
<!-- /.container-fluid -->
@endsection
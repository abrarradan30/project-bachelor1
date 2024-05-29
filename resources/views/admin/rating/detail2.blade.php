@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Rating</h1>

<!-- Form Rating -->
<div class="card shadow mb-4">
    @foreach ($rating as $r)
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Rating</h6>
    </div>
    <div class="card-body">
        <form>
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="users_id" type="text" class="form-control" value="{{ $r->nama }}" readonly>
            </div>

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <input id="materi_id" type="text" class="form-control" value="{{ $r->judul_materi }}" readonly>
            </div>

            <!-- Rating -->
            <div class="form-group">
                <label for="rating">Rating :</label>
                <input id="rating" type="text" class="form-control" value="{{ $r->rating }}" readonly>
            </div>

            <div class="form-group">
            <label for="feedback">Feedback :</label>
            <textarea id="feedback" cols="30" rows="10" class="form-control" readonly>{{ $r->feedback }}</textarea>
            </div>

            <!-- Link Kembali -->
            <div class="form-group">
                <a href="{{ url('rating') }}" class="btn btn-info">Kembali</a>
            </div>
        </form>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
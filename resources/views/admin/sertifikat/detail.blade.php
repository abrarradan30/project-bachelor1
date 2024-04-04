@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Sertifikat</h1>

<!-- Form Sertifikat -->
<div class="card shadow mb-4">
    @foreach ($sertifikat as $s)
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Sertifikat</h6>
    </div>
    <div class="card-body">
        <form>
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="users_id" type="text" class="form-control" value="{{ $s->nama }}" readonly>
            </div>

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <input id="materi_id" type="text" class="form-control" value="{{ $s->judul_materi }}" readonly>
            </div>

            <!-- Link Kembali -->
            <div class="form-group">
                <a href="{{ url('sertifikat') }}" class="btn btn-info">Kembali</a>
            </div>
        </form>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
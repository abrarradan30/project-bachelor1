@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Hasil Kuis</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    @foreach(@hasil_kuis as $hk)
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Hasil Kuis</h6>
    </div>
    <div class="card-body">

            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="nama" name="nama" type="text" class="form-control" value="{{ $hk->nama }}" readonly>
            </div>

            <!-- Input Materi -->
            <div class="form-group">
                <label for="materi_id">Materi :</label>
                <input id="judul_materi" type="text" class="form-control" value="{{ $hk->judul_materi }}" readonly>
            </div>

            <!-- Input Skor -->
            <div class="form-group">
                <label for="skor">Skor :</label>
                <input id="skor" name="skor" type="text" class="form-control" value="{{ $hk->skor }}" readonly>
            </div>

            <div class="form-group">
                <a href="{{ url('hasil_kuis') }}" class="btn btn-secondary">Kembali</a>
            </div>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Balasan Diskusi</h1>

<!-- Form Detail Balasan Diskusi -->
<div class="card shadow mb-4">
    @foreach($balasan_diskusi as $bd) 
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Balasan Diskusi</h6>
    </div>
    <div class="card-body">
            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="nama" name="nama" type="text" class="form-control" value="{{ $bd->nama }}" readonly>
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="pertanyaan"> Pertanyaan :</label>
                <input id="pertanyaan" type="text" class="form-control" value="{{ $bd->pertanyaan }}" readonly>
            </div>

            <!-- Input Balasan -->
            <div class="form-group">
                <label for="balasan">Balasan :</label>
                <textarea id="balasan" name="balasan" cols="30" rows="10" class="form-control">{{ $bd->balasan }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <a href="{{ url('balasan_diskusi') }}" class="btn btn-secondary">Kembali</a>
            </div>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Buat Sertifikat</h1>

<!-- Form Sertifikat -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Buat Sertifikat</h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('input_sertifikat/store/{id}') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="name" name="nama" type="text" class="form-control" value="{{ Auth::user()->name }}" readonly/>
            </div>

            <!-- Input Judul Materi -->
            @foreach($materi as $m)
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <input id="materi_id" name="materi_id" type="text" class="form-control" value="{{ $m->judul }}" readonly>
            </div>

            <div class="form-group">
                <label for="level">Level :</label>
                <input id="level" name="level" type="text" class="form-control" value="{{ $m->level }}" readonly>
            </div>
            @endforeach

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Buat</button> &nbsp;
        </form>
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('progres_materi') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
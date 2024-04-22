@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Pembayaran</h1>

<!-- Form Pembayaran -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Pembayaran</h6>
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
        <form method="POST" action="{{ url('pembayaran/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="users_id" name="nama" type="text" class="form-control" value="{{ auth()->user()->name }}" readonly> 
            </div>

            <!-- Input Materi -->
            <div class="form-group">
                <label for="materi_id">Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select @error('materi_id') is-invalid @enderror">
                    @foreach ($materi as $m)
                        <option value="{{ $m->id }}">{{ $m->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="progres">Progres :</label>
                <input type="number" id="progres" name="progres" class="form-control @error('progres') is-invalid @enderror" value="0">
            </div>

            <!-- Input Status Selesai (Radio Button) -->
            <div class="form-group">
                <label>Status Selesai :</label>
                <div class="form-check">
                    <input name="status_selesai" id="status_selesai" type="radio" class="form-check-label" value="belum selesai">
                    <label class="form-check-label" for="belum selesai">Belum Selesai</label>
                </div>
                <div class="form-check">
                    <input name="status_selesai" id="status_selesai" type="radio" class="form-check-label" value="selesai">
                    <label class="form-check-label" for="selesai">Selesai</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('progres_belajar') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
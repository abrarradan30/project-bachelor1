@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Materi</h1>

<!-- Form Materi -->
<div class="card shadow mb-4">
    @foreach ($materi as $m)
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Materi</h6>
    </div>
    <div class="card-body">
        <form>
            <!-- Judul Materi -->
            <div class="form-group">
                <label for="judul">Judul Materi :</label>
                <input id="judul" type="text" class="form-control" value="{{ $m->judul }}" readonly>
            </div>

            <!-- Background Materi -->
            <div class="form-group">
                <label for="bg_materi">Background Materi :</label>
                <div class="d-flex align-items-center">
                    <input id="bg_materi" type="text" class="form-control mr-2" value="{{ $m->bg_materi }}" readonly>
                    @empty($m->bg_materi)
                        <img src="{{ url('admin/img/nofoto.png') }}" alt="project-image" class="rounded" style="max-width: 100px;">
                    @else
                        <img src="{{ url('admin/img') }}/{{ $dk->gambar }}" alt="project-image" class="rounded" style="max-width: 100px;">
                    @endempty
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <input id="deskripsi" type="text" class="form-control" value="{{ $m->deskripsi }}" readonly>
            </div>

            <!-- Harga -->
            <div class="form-group">
                <label for="harga">Harga :</label>
                <input id="harga" type="text" class="form-control" value="{{ $m->harga }}" readonly>
            </div>

            <!-- Kategori -->
            <div class="form-group">
                <label for="kategori">Kategori :</label>
                <input id="kategori" type="text" class="form-control" value="{{ $m->kategori }}" readonly>
            </div>

            <!-- Level -->
            <div class="form-group">
                <label for="level">Level :</label>
                <input id="level" type="text" class="form-control" value="{{ $m->level }}" readonly>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status :</label>
                <input id="status" type="text" class="form-control" value="{{ $materi->status }}" readonly>
            </div>

            <!-- Link Kembali -->
            <div class="form-group">
                <a href="{{ url('materi') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Materi</h1>

<!-- Form Materi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Materi</h6>
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
        <form method="POST" action="{{ url('materi/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Judul -->
            <div class="form-group">
                <label for="judul">Judul Materi :</label>
                <input id="judul" name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input File BG Materi -->
            <div class="form-group">
                <label for="bg_materi">Pilih Background Materi :</label>
                <input id="bg_materi" name="bg_materi" type="file" class="form-control-file @error('bg_materi') is-invalid @enderror">
                @error('bg_materi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <!-- Input Deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <input id="deskripsi" name="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan judul materi">
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Harga -->
        <div class="form-group">
            <label for="harga">Harga :</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input id="harga" name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan harga">
            </div>
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


            <!-- Input Kategori -->
            <div class="form-group">
                <label>Kategori :</label>
                <div class="form-check">
                    <input name="kategori" id="kategori" type="radio" class="form-check-input" value="IT">
                    <label class="form-check-label" for="it">IT</label>
                </div>
                <div class="form-check">
                    <input name="kategori" id="kategori" type="radio" class="form-check-input" value="Desain">
                    <label class="form-check-label" for="desain">Desain</label>
                </div>
                <div class="form-check">
                    <input name="kategori" id="kategori" type="radio" class="form-check-input" value="Softskill">
                    <label class="form-check-label" for="softskill">Softskill</label>
                </div>
            </div>

            <!-- Input Level -->
            <div class="form-group">
                <label>Level :</label>
                <div class="form-check">
                    <input name="level" id="pemula" type="radio" class="form-check-input" value="pemula">
                    <label class="form-check-label" for="pemula">Pemula</label>
                </div>
                <div class="form-check">
                    <input name="level" id="menengah" type="radio" class="form-check-input" value="menengah">
                    <label class="form-check-label" for="menengah">Menengah</label>
                </div>
                <div class="form-check">
                    <input name="level" id="mahir" type="radio" class="form-check-input" value="mahir">
                    <label class="form-check-label" for="mahir">Mahir</label>
                </div>
            </div>

            <!-- Input Status -->
            <div class="form-group">
                <label>Status :</label>
                <div class="form-check">
                    <input name="status" id="proses" type="radio" class="form-check-input" value="proses">
                    <label class="form-check-label" for="proses">Proses</label>
                </div>
                <div class="form-check">
                    <input name="status" id="publik" type="radio" class="form-check-input" value="publik">
                    <label class="form-check-label" for="publik">Publik</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('materi') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
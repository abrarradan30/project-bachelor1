@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Profil Anda</h1>
<p class="mb-4">Dengan melengkapi profil dengan informasi yang akurat, dapat membantu dalam verifikasi identitas pengguna. </p>

<!-- Form Profil Pengguna -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
    </div>
    <div class="card-body">
    <form>
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>

            <!-- Input Email (Non-Editable) -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" readonly>
            </div>

            <!-- Input Deskripsi Diri -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi Diri:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Diri"></textarea>
            </div>

            <!-- Input Foto -->
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
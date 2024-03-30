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
                <input type="text" class="form-control" id="name" name="nama" value="{{ Auth::user()->name }}" readonly>
            </div>

            <!-- Input Email (Non-Editable) -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>

            <!-- Input Deskripsi Diri -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi Diri:</label>
                <textarea class="form-control" id="deskripsi_diri" name="deskripsi" rows="3" readonly>{{ Auth::user()->deskripsi }}</textarea>
            </div>

            <!-- Input Foto -->
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <!-- Submit Button -->
            <button type="button" class="btn btn-warning btn-sm">
                <a href="{{ url('profil/edit/') }}" style="text-decoration: none; color: inherit;">Edit</a>
            </button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
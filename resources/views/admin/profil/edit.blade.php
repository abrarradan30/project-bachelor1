@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Profil Anda</h1>

<!-- Form Profil Pengguna -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Diri</h6>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{ url('profil/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="name" name="nama" value="{{ Auth::user()->name }}" required>
            </div>

            <!-- Input Email (Non-Editable) -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>

            <!-- Input Deskripsi Diri -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi Diri:</label>
                <textarea class="form-control" id="deskripsi_diri" name="deskripsi" rows="3">{{ Auth::user()->deskripsi }}</textarea>
            </div>

            <!-- Input Foto -->
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
            <button type="button" class="btn btn-danger">
                <a href="{{ url('profil') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
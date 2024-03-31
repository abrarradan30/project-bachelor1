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
    @foreach($user as $u)
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
                <input type="hidden" name="id" value="{{$u->id}}"/><br>
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $u->name }}">
            </div>

            <!-- Input Email (Non-Editable) -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $u->email }}" readonly>
            </div>

            <!-- Input Deskripsi Diri -->
            <div class="form-group">
                <label for="deskripsi_diri">Deskripsi Diri :</label>
                <input id="deskripsi_diri" name="deskripsi_diri" type="text" class="form-control" value="{{ $u->deskripsi_diri }}">
            </div>

            <!-- Input Foto -->
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
                @if (!empty($u->foto))
                <div class="mt-2">
                    <img src="{{ url('admin/img') }}/{{ $u->foto }}" width="10%" height="15%">
                    <br>{{ $u->foto }}
                </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    @endforeach
            &nbsp;
                <button type="button" class="btn btn-danger">
                    <a href="{{ url('profil') }}" style="text-decoration: none; color: inherit;">Batal</a>
                </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
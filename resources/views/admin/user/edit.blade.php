@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit User</h1>

<!-- Form User -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
    </div>
    <div class="card-body">
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
        <form method="POST" action="{{ url('user/update') }}" enctype="multipart/form-data">
        {{csrf_field()}}
            <!-- Input Nama -->
            <div class="form-group">
                <input type="hidden" name="id" value="{{$u->id}}"/><br>
                <label for="nama">Nama :</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ $u->name }}">
            </div>

            <!-- Input Email -->
            <div class="form-group">
                <label for="email">Email :</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ $u->email }}">
            </div>

            <!-- Input Deskripsi Diri -->
            <div class="form-group">
                <label for="deskripsi_diri">Deskripsi Diri :</label>
                <input id="deskripsi_diri" name="deskripsi_diri" type="text" class="form-control" value="{{ $u->deskripsi_diri }}">
            </div>

            <!-- Input File Foto -->
            <div class="form-group">
                <label for="foto">Foto :</label>
                <input id="foto" name="foto" type="file" class="form-control-file">
                @if (!empty($u->foto))
                <div class="mt-2">
                    <img src="{{ url('admin/img') }}/{{ $u->foto }}" width="50%">
                    <br>{{ $u->foto }}
                </div>
                @endif
            </div>

            <!-- Input Role -->
            <div class="form-group">
                <label for="role">Role :</label><br>
                @foreach($ar_role as $role)
                    @php $cek = ($role == $u->role) ? 'checked' : ''; @endphp
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="role" value="{{$role}}" {{$cek}}>
                    <label class="form-check-label" for="radio">{{ $role }}</label>
                </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
    @endforeach
                <button type="button" class="btn btn-danger">
                    <a href="{{ url('user') }}" style="text-decoration: none; color: inherit;">Batal</a>
                </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection

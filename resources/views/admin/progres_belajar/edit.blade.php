@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Progres Belajar</h1>

<!-- Form Progres Belajar -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Progres Belajar</h6>
    </div>
    <div class="card-body">
    @foreach($progres_belajar as $pb)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('progres_belajar/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $pb->id }}">
                <label for="user_id">Nama :</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ $pb->name }}" readonly>
            </div>

            <!-- Input Materi -->
            <div class="form-group">
                <label for="materi_id">Materi :</label>
                <input id="judul" name="judul" type="text" class="form-control" value="{{ $pb->judul }}" readonly>
            </div>

            <div class="form-group">
                <label for="progres">Progres :</label>
                <input type="number" id="progres" name="progres" class="form-control" value="{{ $pb->progres }}" min="0" max="100"/>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('progres_belajar') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
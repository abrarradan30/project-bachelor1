@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Rating</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Rating</h6>
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
        <form method="POST" action="{{ url('rating/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <select id="users_id" name="users_id" class="custom-select">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
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

            <!-- Input Rating -->
            <div class="form-group">
                <label>Rating :</label>
                <div class="form-check">
                    <input name="rating" id="rating" type="radio" class="form-check-input" value="1">
                    <label class="form-check-label" for="1">1</label>
                </div>
                <div class="form-check">
                    <input name="rating" id="rating" type="radio" class="form-check-input" value="2">
                    <label class="form-check-label" for="2">2</label>
                </div>
                <div class="form-check">
                    <input name="rating" id="rating" type="radio" class="form-check-input" value="3">
                    <label class="form-check-label" for="3">3</label>
                </div>
                <div class="form-check">
                    <input name="rating" id="rating" type="radio" class="form-check-input" value="4">
                    <label class="form-check-label" for="4">4</label>
                </div>
                <div class="form-check">
                    <input name="rating" id="rating" type="radio" class="form-check-input" value="5">
                    <label class="form-check-label" for="5">5</label>
                </div>
            </div>

            <!-- Input Feedback -->
            <div class="form-group">
                <label for="">Feedback :</label>
                <textarea id="feedback" name="feedback" cols="30" rows="10" class="form-control @error('judul_materi') is-invalid @enderror"></textarea>
                @error('feedback')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('rating') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

<style>
/* rating */
.rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: left;
}

.rating > input{ display:none;}

.rating > label {
  position: relative;
    width: 1em;
    font-size: 3vw;
    color: #FFD600;
    cursor: pointer;
}
.rating > label::before{ 
  content: "\2605";
  position: absolute;
  opacity: 0;
}
.rating > label:hover:before,
.rating > label:hover ~ label:before {
  opacity: 1 !important;
}

.rating > input:checked ~ label:before{
  opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }

</style>

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
                <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ Auth::user()->name }}" readonly>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
            <div class="form-group row">
                <label class="col-2">Rating</label>
                <div class="col-8">
                    <br>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="rating5"><label for="rating5">☆</label>
                        <input type="radio" name="rating" value="4" id="rating4"><label for="rating4">☆</label>
                        <input type="radio" name="rating" value="3" id="rating3"><label for="rating3">☆</label>
                        <input type="radio" name="rating" value="2" id="rating2"><label for="rating2">☆</label>
                        <input type="radio" name="rating" value="1" id="rating1"><label for="rating1">☆</label>
                    </div>
                </div>
            </div>

            <!-- Input Feedback -->
            <div class="form-group">
                <label for="">Feedback :</label>
                <textarea id="feedback" name="feedback" cols="10" rows="3" class="form-control @error('judul_materi') is-invalid @enderror"></textarea>
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
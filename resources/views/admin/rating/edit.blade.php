@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Rating</h1>

<!-- Form Rating -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Rating</h6>
    </div>
    <div class="card-body">
    @foreach($rating as $r)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('rating/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $r->id }}">
                <label for="users_id">Nama :</label>
                <select id="users_id" name="users_id" class="custom-select">
                    @foreach($users as $u)
                    @php $sel = ($u->id == $r->users_id) ? 'selected' : ''; @endphp
                        <option value="{{ $u->id }}" {{ $sel }}>{{ $u->name }}</option>
                    @endforeach 
                </select>
            </div>

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select">
                    @foreach($materi as $m)
                    @php $sel = ($m->id == $r->materi_id) ? 'selected' : ''; @endphp
                        <option value="{{$m->id}}" {{$sel}}>{{ $m->judul }}</option>
                    @endforeach 
                </select>
            </div>

            <!-- Input Rating -->
            <div class="form-group">
                <label>Rating :</label>
                @foreach ($ar_rating as $rtg)
                    @php $cek = ($rtg == $r->rating) ? "checked" : ""; @endphp 
                <div class="form-check">
                    <input name="rating" id="rating" type="radio" class="form-check-input" value="{{ $rtg }}" {{ $cek }}>
                    <label class="form-check-label" for="rating">{{ $rtg }}</label>
                </div>
                @endforeach
            </div>

            <!-- Input Feedback -->
            <div class="form-group">
                <label for="feedback">Feedback :</label>
                <textarea id="feedback" name="feedback" cols="30" rows="10" class="form-control">{{ $r->feedback }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('rating') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
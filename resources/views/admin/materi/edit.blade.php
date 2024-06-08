@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Materi</h1>

<!-- Form Materi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Materi</h6>
    </div>
    <div class="card-body">
    @foreach($materi as $m)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('materi/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Judul -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $m->id }}">
                <label for="judul">Judul Materi :</label>
                <input id="judul" name="judul" type="text" class="form-control" value="{{ $m->judul }}">
            </div>

            <!-- Input File BG Materi -->
            <div class="form-group">
                <label for="bg_materi">bg_materi :</label>
                <input id="bg_materi" name="bg_materi" type="file" class="form-control-file">
                @if (!empty($m->bg_materi))
                <div class="mt-2">
                    <img src="{{ url('admin/img') }}/{{ $m->bg_materi }}" width="30%">
                    <br>{{ $m->bg_materi }}
                </div>
                @endif
            </div>

            <!-- Input Deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <input id="deskripsi" name="deskripsi" type="text" class="form-control" value="{{ $m->deskripsi }}">
            </div>

            <!-- Input Harga -->
            <div class="form-group">
                <label for="harga">Harga :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input id="harga" name="harga" type="number" class="form-control" value="{{ $m->harga }}">
                </div>
            </div>

            <!-- Input Kategori -->
            <div class="form-group">
                <label>Kategori :</label>
                @foreach ($ar_kategori as $ktg)
                    @php $cek = ($ktg == $m->kategori) ? "checked" : ""; @endphp 
                <div class="form-check">
                    <input name="kategori" id="kategori" type="radio" class="form-check-input" value="{{ $ktg }}" {{ $cek }}>
                    <label class="form-check-label" for="kategori">{{ $ktg }}</label>
                </div>
                @endforeach
            </div>

            <!-- Input Level -->
            <div class="form-group">
                <label>Level :</label>
                @foreach ($ar_level as $lv)
                    @php $cek = ($lv == $m->level) ? "checked" : ""; @endphp 
                <div class="form-check">
                    <input name="level" id="level" type="radio" class="form-check-input" value="{{ $lv }}" {{ $cek }}>
                    <label class="form-check-label" for="level">{{ $lv }}</label>
                </div>
                @endforeach
            </div>

            <!-- Input Status -->
            @if(Auth::check() && Auth::user()->role == 'admin')
            <div class="form-group">
                <label>Status :</label>
                @foreach ($ar_status as $st)
                    @php $cek = ($st == $m->status) ? "checked" : ""; @endphp 
                <div class="form-check">
                    <input name="status" id="status" type="radio" class="form-check-input" value="{{ $st }}" {{ $cek }}>
                    <label class="form-check-label" for="status">{{ $st }}</label>
                </div>
                @endforeach
            </div>
            @elseif(Auth::check() && Auth::user()->role == 'mentor')
            <div class="form-group">
            </div>
            @endif

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
    @endforeach
                <button type="button" class="btn btn-danger">
                    <a href="{{ url('materi') }}" style="text-decoration: none; color: inherit;">Batal</a>
                </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
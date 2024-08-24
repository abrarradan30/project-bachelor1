@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Detail Materi</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Detail Materi</h6>
    </div>
    <div class="card-body">
    @foreach($detail_materi as $dm)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/detail_materi/update/{{ $dm->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Judul Materi -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $dm->id }}">
                <label for="materi_id">Judul Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select">
                    @foreach ($materi as $m)
                    @php $sel = ($m->id == $dm->materi_id) ? 'selected' : ''; @endphp
                        <option value="{{ $m->id }}" {{ $sel }}>{{ $m->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Modul -->
            <div class="form-group">
                <label for="modul">Modul :</label>
                <input id="modul" name="modul" type="text" class="form-control" value="{{ $dm->modul }}">
            </div>

            <!-- Input Isi Materi -->
            <div class="form-group">
                <label for="isi_materi">Isi Materi :</label>
                <textarea id="isi_materi" name="isi_materi" cols="30" rows="10" class="form-control">{{ $dm->isi_materi }}</textarea>
            </div>

            <!-- Input Soal -->
            <div class="form-group">
                <label for="soal">Soal :</label>
                <textarea id="soal" name="soal" cols="30" rows="10" class="form-control">{{ $dm->soal }}</textarea>
            </div>

            <!-- Input Pilihan A -->
            <div class="form-group">
                <label for="a">Pilihan A :</label>
                <input id="a" name="a" type="text" class="form-control" value="{{ $dm->a }}">
            </div>

            <!-- Input Pilihan B -->
            <div class="form-group">
                <label for="b">Pilihan B :</label>
                <input id="b" name="b" type="text" class="form-control" value="{{ $dm->b }}">
            </div>

            <!-- Input Pilihan C -->
            <div class="form-group">
                <label for="c">Pilihan C :</label>
                <input id="c" name="c" type="text" class="form-control" value="{{ $dm->c }}">
            </div>

            <!-- Input Pilihan D -->
            <div class="form-group">
                <label for="d">Pilihan D :</label>
                <input id="d" name="d" type="text" class="form-control" value="{{ $dm->d }}">
            </div>

            <!-- Input Kunci Jawaban -->
            <div class="form-group">
                <label for="kunci">Kunci Jawaban :</label>
                <input id="kunci" name="kunci" type="text" class="form-control" value="{{ $dm->kunci }}">
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('detail_materi') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<script>
    $('#isi_materi').summernote({
        placeholder: 'isi_materi...',
        tabsize:2,
        height:300
    });
</script>
<!-- /.container-fluid -->
@endsection
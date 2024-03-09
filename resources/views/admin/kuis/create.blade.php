@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Kuis</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Kuis</h6>
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
        <form method="POST" action="{{ url('admin/kuis/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select">
                    @foreach ($materi as $m)
                        <option value="{{ $m->id }}">{{ $m->judul_materi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Soal -->
            <div class="form-group">
                <label for="soal">Soal :</label>
                <textarea id="soal" name="soal" cols="30" rows="10" class="form-control @error('soal') is-invalid @enderror"></textarea>
                @error('soal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Pilihan A -->
            <div class="form-group">
                <label for="a">Pilihan A :</label>
                <input id="a" name="a" type="text" class="form-control @error('a') is-invalid @enderror" placeholder="Masukkan Pilihan A">
                @error('a')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Pilihan B -->
            <div class="form-group">
                <label for="b">Pilihan B :</label>
                <input id="b" name="b" type="text" class="form-control @error('b') is-invalid @enderror" placeholder="Masukkan Pilihan B">
                @error('b')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Pilihan C -->
            <div class="form-group">
                <label for="c">Pilihan C :</label>
                <input id="c" name="c" type="text" class="form-control @error('c') is-invalid @enderror" placeholder="Masukkan Pilihan C">
                @error('c')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Pilihan D -->
            <div class="form-group">
                <label for="d">Pilihan D :</label>
                <input id="d" name="d" type="text" class="form-control @error('d') is-invalid @enderror" placeholder="Masukkan Pilihan D">
                @error('d')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Kunci Jawaban -->
            <div class="form-group">
                <label for="kunci">Kunci Jawaban :</label>
                <input id="kunci" name="kunci" type="text" class="form-control @error('kunci') is-invalid @enderror" placeholder="Masukkan Kunci Jawaban">
                @error('kunci')
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
                    <a href="{{ url('kuis') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

<script>
    $('#soal').summernote({
        placeholder: 'soal...',
        tabsize:2,
        height:300
    });
</script>

</div>
<!-- /.container-fluid -->
@endsection
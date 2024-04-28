@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Kuis</h1>

<!-- Form Kuis -->
<div class="card shadow mb-4">
    @foreach($kuis as $k)
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Kuis</h6>
    </div>
    <div class="card-body">
        
            <!-- Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                @foreach ($materi as $m)
                <input id="judul_materi" type="text" class="form-control" value="{{ $m->judul }}" readonly>
                @endforeach
            </div>

            <!-- Input Soal -->
            <div class="form-group">
                <label for="soal">Soal :</label>
                <div>
                    {!! $k->soal !!}
                </div>
            </div>

            <!-- Input Pilihan A -->
            <div class="form-group">
                <label for="a">Pilihan A :</label>
                <input id="a" name="a" type="text" class="form-control" value="{{ $k->a }}" readonly>
            </div>

            <!-- Input Pilihan B -->
            <div class="form-group">
                <label for="b">Pilihan B :</label>
                <input id="b" name="b" type="text" class="form-control" value="{{ $k->b }}" readonly>
            </div>

            <!-- Input Pilihan C -->
            <div class="form-group">
                <label for="c">Pilihan C :</label>
                <input id="c" name="c" type="text" class="form-control" value="{{ $k->c }}" readonly>
            </div>

            <!-- Input Pilihan D -->
            <div class="form-group">
                <label for="d">Pilihan D :</label>
                <input id="d" name="d" type="text" class="form-control" value="{{ $k->d }}" readonly>
            </div>

            <!-- Input Kunci Jawaban -->
            <div class="form-group">
                <label for="kunci">Kunci Jawaban :</label>
                <input id="kunci" name="kunci" type="text" class="form-control" value="{{ $k->kunci }}" readonly>
            </div>

            <div class="form-group">
                <a href="{{ url('kuis') }}" class="btn btn-secondary">Kembali</a>
            </div>
    </div>
    @endforeach
</div>

</div>
<!-- /.container-fluid -->
@endsection
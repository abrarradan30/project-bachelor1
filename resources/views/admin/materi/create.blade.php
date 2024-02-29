@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Materi</h1>

<!-- Form Materi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Materi</h6>
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
        <form method="POST" action="{{ url('admin/materi/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Judul -->
            <div class="form-group">
                <label for="judul">Judul :</label>
                <input id="judul" name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="judul_materi">Judul Materi :</label>
                <input id="judul_materi" name="judul_materi" type="text" class="form-control @error('judul_materi') is-invalid @enderror" placeholder="Masukkan judul materi">
                @error('judul_materi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="">Pertanyaan :</label>
                <textarea id="pertanyaan" name="pertanyaan" cols="30" rows="10" class="form-control @error('judul_materi') is-invalid @enderror"></textarea>
                @error('pertanyaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Status Diskusi (Radio Button) -->
            <div class="form-group">
                <label>Status Diskusi:</label>
                <div class="form-check">
                    <input name="status_diskusi" id="selesai" type="radio" class="form-check-label" value="selesai">
                    <label class="form-check-label" for="selesai">Selesai</label>
                </div>
                <div class="form-check">
                    <input name="status_diskusi" id="belum selesai" type="radio" class="form-check-label" value="belum selesai">
                    <label class="form-check-label" for="belum selesai">Belum Selesai</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('forum_diskusi') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

<script>
    $('#pertanyaan').summernote({
        placeholder: 'pertanyaan...',
        tabsize:2,
        height:300
    });
</script>

</div>
<!-- /.container-fluid -->
@endsection
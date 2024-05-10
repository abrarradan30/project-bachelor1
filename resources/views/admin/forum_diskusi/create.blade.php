@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Diskusi</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Diskusi</h6>
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
        <form method="POST" action="{{ url('forum_diskusi/store') }}" enctype="multipart/form-data">
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

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select">
                    @foreach ($materi as $m)
                        <option value="{{ $m->id }}">{{ $m->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="">Pertanyaan :</label>
                <textarea id="pertanyaan" name="pertanyaan" cols="30" rows="10" class="form-control @error('pertanyaan') is-invalid @enderror"></textarea>
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
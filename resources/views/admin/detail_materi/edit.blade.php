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

            <!-- Input Sub Judul -->
            <div class="form-group">
                <label for="sub_judul">Sub Judul :</label>
                <input id="sub_judul" name="sub_judul" type="text" class="form-control" value="{{ $dm->sub_judul }}">
            </div>

            <!-- Input Isi Materi -->
            <div class="form-group">
                <label for="isi_materi">Isi Materi :</label>
                <textarea id="isi_materi" name="isi_materi" cols="30" rows="10" class="form-control">{{ $dm->isi_materi }}</textarea>
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
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Diskusi</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Diskusi</h6>
    </div>
    <div class="card-body">
    @foreach($forum_diskusi as $fd)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/forum_diskusi/update/{{ $fd->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $fd->id }}">
                <label for="nama">Nama :</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ $fd->name }}" readonly>
            </div>

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <input id="judul" name="judul" type="text" class="form-control" value="{{ $fd->judul }}" readonly>
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan :</label>
                <textarea id="pertanyaan" name="pertanyaan" cols="30" rows="10" class="form-control">{{ $fd->pertanyaan }}</textarea>
            </div>

            <!-- Input Status Diskusi (Radio Button) -->
            <div class="form-group">
                <label>Status Diskusi:</label>
                @foreach ($ar_status_diskusi as $sd)
                    @php $cek = ($sd == $fd->status_diskusi) ? "checked" : ""; @endphp 
                <div class="form-check">
                    <input name="status_diskusi" id="status_diskusi" type="radio" class="form-check-label" value="{{ $sd }}" {{ $cek }}>
                    <label class="form-check-label" for="status_diskusi">{{ $sd }}</label>
                </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('forum_diskusi') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
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
<!-- /.container-fluid -->
@endsection
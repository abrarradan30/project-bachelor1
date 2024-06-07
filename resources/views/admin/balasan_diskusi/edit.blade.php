@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Balasan Diskusi</h1>

<!-- Form Edit Balasan Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Balasan Diskusi</h6>
    </div>
    <div class="card-body">
    @foreach($balasan_diskusi as $bd)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/balasan_diskusi/update/{{ $bd->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $bd->id }}">
                <label for="nama">Nama :</label>
                <input id="nama" name="nama" type="text" class="form-control" value="{{ $bd->users_id }}">
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="forum_diskusi_id"> Pertanyaan :</label>
                <select id="forum_diskusi_id" name="forum_diskusi_id" class="custom-select" disabled>
                    @foreach ($forum_diskusi as $fd)
                    @php $sel = ($fd->id == $bd->forum_diskusi_id) ? 'selected' : ''; @endphp
                        <option value="{{ $fd->id }}" {{ $sel }}>{!! $fd->pertanyaan !!}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Balasan -->
            <div class="form-group">
                <label for="balasan">Balasan :</label>
                <textarea id="balasan" name="balasan" cols="30" rows="10" class="form-control">{{ $bd->balasan }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('balasan_diskusi') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

<script>
    $('#balasan').summernote({
        placeholder: 'balasan...',
        tabsize:2,
        height:300
    });
</script>

</div>
<!-- /.container-fluid -->
@endsection
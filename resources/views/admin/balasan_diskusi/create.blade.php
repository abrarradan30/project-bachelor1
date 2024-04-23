@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Balasan Diskusi</h1>

<!-- Form Balasan Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Balasan Diskusi</h6>
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
        <form method="POST" action="{{ url('admin/balasan_diskusi/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="forum_diskusi_id"> Pertanyaan :</label>
                <select id="forum_diskusi_id" name="forum_diskusi_id" class="custom-select">
                    @foreach ($forum_diskusi as $fd)
                        <option value="{{ $fd->id }}">{{ $fd->pertanyaan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Balasan -->
            <div class="form-group">
                <label for="balasan">Balasan :</label>
                <textarea id="balasan" name="balasan" cols="30" rows="10" class="form-control @error('balasan') is-invalid @enderror"></textarea>
                @error('balasan')
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
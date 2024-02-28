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
        <form method="POST" action="{{ url('admin/forum_diskusi/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>

            <!-- Input Topik -->
            <div class="form-group">
                <label for="topik">Topik:</label>
                <input type="text" class="form-control" id="topik" name="topik" placeholder="Masukkan Topik" required>
            </div>

            <!-- Input Pertanyaan -->
            <div class="form-group">
                <label for="">Pertanyaan:</label>
                <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="10"></textarea>
            </div>

            <!-- Input Status Diskusi (Radio Button) -->
            <div class="form-group">
                <label>Status Diskusi:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="selesai" name="statusDiskusi" value="selesai">
                    <label class="form-check-label" for="selesai">Selesai</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="belumSelesai" name="statusDiskusi" value="belumSelesai">
                    <label class="form-check-label" for="belumSelesai">Belum Selesai</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger">
                    <a href="{{ url('forum_diskusi') }}" style="text-decoration: none; color: inherit;">Batal</a>
                </button>
            </div>
        </form>
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
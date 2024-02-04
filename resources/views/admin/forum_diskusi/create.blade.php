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
        <form>
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
                <label for="pertanyaan">Pertanyaan:</label>
                <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3" placeholder="Masukkan Pertanyaan"></textarea>
            </div>

            <!-- Input Detail Pertanyaan (Upload Foto) -->
            <div class="form-group">
                <label for="detailPertanyaan">Detail Pertanyaan (Upload Foto - Opsional):</label>
                <input type="file" class="form-control-file" id="detailPertanyaan" name="detailPertanyaan">
            </div>

            <!-- Input Posting (Date) -->
            <div class="form-group">
                <label for="posting">Posting:</label>
                <input type="date" class="form-control" id="posting" name="posting">
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
                <button type="button" class="btn btn-danger">Batal</button>
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
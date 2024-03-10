@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Hasil Kuis</h1>

<!-- Form Diskusi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Hasil Kuis</h6>
    </div>
    <div class="card-body">
    @foreach($hasil_kuis as $hk)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('admin/hasil_kuis/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input id="nama" name="nama" type="text" class="form-control" value="{{ $hk->nama }}">
            </div>

            <!-- Input Materi -->
            <div class="form-group">
                <label for="materi_id">Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select @error('materi_id') is-invalid @enderror">
                    @foreach ($materi as $m)
                    @php $sel = ($m->id == $fd->materi_id) ? 'selected' : ''; @endphp
                        <option value="{{ $m->id }}" {{ $sel }}>{{ $m->judul_materi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Skor -->
            <div class="form-group">
                <label for="skor">Skor :</label>
                <input id="skor" name="skor" type="text" class="form-control" value="{{ $hk->skor }}">
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('hasil_kuis') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambahkan Sertifikat</h1>

<!-- Form Sertifikat -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Sertifikat</h6>
    </div>
    <div class="card-body">
    @foreach($sertifikat as $s)
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('sertifikat/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $s->id }}">
                <label for="users_id">Nama :</label>
                <select id="users_id" name="users_id" class="custom-select">
                    @foreach($users as $u)
                    @php $sel = ($u->id == $s->users_id) ? 'selected' : ''; @endphp
                        <option value="{{ $u->id }}" {{ $sel }}>{{ $u->name }}</option>
                    @endforeach 
                </select>
            </div>

            <!-- Input Judul Materi -->
            <div class="form-group">
                <label for="materi_id">Judul Materi :</label>
                <select id="materi_id" name="materi_id" class="custom-select">
                    @foreach($materi as $m)
                    @php $sel = ($m->id == $s->materi_id) ? 'selected' : ''; @endphp
                        <option value="{{$m->id}}" {{$sel}}>{{ $m->judul }}</option>
                    @endforeach 
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
        </form>
    @endforeach
            <button type="button" class="btn btn-danger">
                    <a href="{{ url('sertifikat') }}" style="text-decoration: none; color: inherit;">Batal</a>
            </button>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Cek Progres Belajar</h1>
<p class="mb-4">progres belajar siswa/mahasiswa.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach ($progres_belajar2 as $pb2)
        <h6 class="m-0 font-weight-bold text-primary">Progres Belajar {{ $pb2->judul_materi }}</h6>
        @endforeach
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Progres</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Progres</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($progres_belajar as $pb)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $pb->nama }}</td>
                        <td>{{ $pb->progres }} %</td>
                        <td>
                            <form action="#" method="POST">
                                <!-- <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('progres_belajar/show/' . $pb->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button> -->
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('progres_belajar/edit/' . $pb->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <a href="{{ url('progres_belajar/delete/' . $pb->id) }}" style="text-decoration: none; color: inherit;">Hapus</a>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-header py-3">
        <a href="{{ url('cek_progres') }}">
        <button class="btn btn-sm btn-danger">Kembali</button>
        </a>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
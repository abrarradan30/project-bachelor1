@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Jawaban</h1>
<p class="mb-4">Menavigasi jawaban dari setiap kuis materi</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Jawaban</h6>
        <br>
        <a href="{{ url('admin/forum_diskusi/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Materi</th>
                        <th>Pertanyaan</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Koreksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Materi</th>
                        <th>Pertanyaan</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Koreksi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>HTML</td>
                        <td>Kepanjangan HTML</td>
                        <td>HTML</td>
                        <td>PHP</td>
                        <td>Ruby</td>
                        <td>Java</td>
                        <td>A</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onclick="showDetail()">Detail</button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editData()">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData()">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
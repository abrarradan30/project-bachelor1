@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Forum Diskusi</h1>
<p class="mb-4">Menavigasi interaksi pengguna satu sama lain dengan mengomentari atau membalas pesan di setiap topik.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Forum Diskusi</h6>
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
                        <th>Nama</th>
                        <th>Topik</th>
                        <th>Pertanyaan</th>
                        <th>Detail Pertanyaan</th>
                        <th>Posting</th>
                        <th>Status Diskusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Topik</th>
                        <th>Pertanyaan</th>
                        <th>Detail Pertanyaan</th>
                        <th>Posting</th>
                        <th>Status Diskusi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
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
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel User</h1>
<p class="mb-4">Menyimpan data dasar pengguna seperti nama, alamat email, password, dll.  <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
        <br>
        <button class="btn btn-sm btn-primary">Tambah</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Deskripsi Diri</th>
                        <th>Foto</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Deskripsi Diri</th>
                        <th>Foto</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>tiger@gmail.com</td>
                        <td>Mahasiswa</td>
                        <td>Tiger</td>
                        <td>Admin</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onclick="showDetail()">Detail</button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editData()">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData()">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>Siswa</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onclick="showDetail()">Detail</button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editData()">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData()">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>Mentor</td>
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
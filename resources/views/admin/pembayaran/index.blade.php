@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Pembayaran</h1>
<p class="mb-4">Menavigasi pembayaran materi.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pembayaran</h6>
        <br>
        <a href="{{ url('pembayaran/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Judul Materi</th>
                        <th>Status</th>
                        <th>Token</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Judul Materi</th>
                        <th>Status</th>
                        <th>Token</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($pembayaran as $py)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $py->nama }}</td>
                        <td>{{ $py->code }}</td>
                        <td>{{ $py->judul_materi}}</td>
                        <td>{{ $py->status}}</td>
                        <td>{{ $py->snap_token }}</td>
                        <td>
                            <form action="#" method="POST">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('admin/pembayaran/show/' . $py->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('admin/pembayaran/edit/' . $py->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <a href="{{ url('admin/pembayaran/delete/' . $py->id) }}" style="text-decoration: none; color: inherit;">Hapus</a>
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
</div>

</div>
<!-- /.container-fluid -->
@endsection
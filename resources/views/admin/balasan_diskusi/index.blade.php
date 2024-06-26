@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Balasan Diskusi</h1>
<p class="mb-4">Menavigasi interaksi pengguna satu sama lain dengan mengomentari atau membalas pesan di setiap topik. Cek forum
    <a href="{{ url('forum') }}" style="text-decoration: none; color: inherit;"> <b class="text-warning"> disini </b></a>.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Balasan Diskusi</h6>
        <br>
        <a href="{{ url('balasan_diskusi/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pertanyaan</th>
                        <th>Balasan</th>
                        <th>Tgl Balasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pertanyaan</th>
                        <th>Balasan</th>
                        <th>Tgl Balasan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($balasan_diskusi as $bd)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $bd->nama }}</td>
                        <td>{!! $bd->pertanyaan !!}</td>
                        <td>{!! $bd->balasan !!}</td>
                        <td>{{ $bd->created_at }}</td>
                        <td>
                            <form action="#" method="POST">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('balasan_diskusi/show/' . $bd->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('balasan_diskusi/edit/' . $bd->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <a href="{{ url('balasan_diskusi/delete/' . $bd->id) }}" style="text-decoration: none; color: inherit;">Hapus</a>
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
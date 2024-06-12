@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Transaksi</h1>
<p class="mb-4">Navigasi pembayaran materi.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Materi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Judul Materi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($transaction as $ts)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $ts->judul }}</td>
                        <td>{{ $ts->price }}</td>
                        <td>
                        @if($ts->status == 'success')
                            <span class="btn btn-success btn-sm" style="pointer-events: none;">{{ $ts->status }}</span>
                        @elseif($ts->status == 'pending')
                            <span class="btn btn-warning btn-sm" style="pointer-events: none;">{{ $ts->status }}</span>
                        @else
                            <span class="btn btn-danger btn-sm" style="pointer-events: none;">{{ $ts->status }}</span>
                        @endif
                        <td>{{ $ts->created_at }}</td>
                        <td>
                            <form action="#" method="POST">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('admin/pembayaran/show/' . $ts->id) }}" style="text-decoration: none; color: inherit;">Bayar</a>
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
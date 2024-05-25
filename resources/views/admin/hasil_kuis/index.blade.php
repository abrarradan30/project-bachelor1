@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Hasil Kuis</h1>
<p class="mb-4">Menavigasi hasil nilai user dari setiap kuis materi yang telah dikerjakan</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Hasil Kuis</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Materi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Materi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($materi as $m)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $m->judul }}</td>
                        <td>
                        <form action="#" method="POST">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('admin/hasil_kuis/show/' . $m->id) }}" style="text-decoration: none; color: inherit;">Cek Hasil Kuis Siswa</a>
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
@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Detail Materi</h1>
<p class="mb-4">Membantu mentor dalam merencanakan dan membuat silabus serta mengelola materi secara terstruktur.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach ($detail_materi2 as $dm2)
        <h6 class="m-0 font-weight-bold text-primary">Tabel Detail Materi {{ $dm2->judul_materi }}</h6>
        @endforeach
        <br>
        <a href="{{ url('detail_materi/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Modul</th>
                        <th>Isi Materi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Modul</th>
                        <th>Isi Materi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($detail_materi as $dm)    
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $dm->modul }}</td>
                        <td>{!! $dm->isi_materi !!}</td>
                        <td>
                            <form action="#" method="POST">
                                <!-- <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('detail_materi/show/' . $dm->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button> -->
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('detail_materi/edit/' . $dm->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                                <script>                                  
                                    function confirmDelete() {
                                    var confirmation = confirm("Yakin hapus data?");
                                        if (confirmation) {
                                            window.location.href = "{{ url('detail_materi/delete/' . $dm->id) }}";
                                        }
                                    }
                                </script>
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
        <a href="{{ url('detail_materi') }}">
        <button class="btn btn-sm btn-secondary">Kembali</button>
        </a>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
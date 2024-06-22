@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Kuis</h1>
<p class="mb-4">Menavigasi kuis setiap materi</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach ($kuis2 as $k2)
        <h6 class="m-0 font-weight-bold text-primary">Kelola Kuis {{ $k2->judul_materi }}</h6>
        <h6 class="m-0 font-weight-bold text-danger">*Buat 5 kuis saja setiap materi</h6>
        @endforeach
        <br>
        <a href="{{ url('kuis/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Kunci</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Kunci</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($kuis as $k)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{!! $k->soal !!}</td>
                        <td>{{ $k->a }}</td>
                        <td>{{ $k->b }}</td>
                        <td>{{ $k->c }}</td>
                        <td>{{ $k->d }}</td>
                        <td>{{ $k->kunci }}</td>
                        <td>
                            <form action="#" method="POST">
                                <!-- <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('kuis/show/' . $k->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button> -->
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('kuis/edit/' . $k->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                                <script>                                  
                                    function confirmDelete() {
                                    var confirmation = confirm("Yakin hapus data?");
                                        if (confirmation) {
                                            window.location.href = "{{ url('kuis/delete/' . $k->id) }}";
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
        <a href="{{ url('kuis') }}">
        <button class="btn btn-sm btn-secondary">Kembali</button>
        </a>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
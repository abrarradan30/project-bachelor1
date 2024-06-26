@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Rating</h1>
<p class="mb-4">Bertujuan untuk memberikan penilaian atau umpan balik terhadap platform pembelajaran. </p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Rating</h6>
        <br>
        <a href="{{ url('rating/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Materi</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Materi</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($rating as $r)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $r->nama }}</td>
                        <td>{{ $r->judul_materi }}</td>
                        <td>{{ $r->rating }}</td>
                        <td>{{ $r->feedback }}</td>
                        <td>
                            <form action="#" method="POST">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('rating/show/' . $r->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('rating/edit/' . $r->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                                <script>                                  
                                    function confirmDelete() {
                                    var confirmation = confirm("Yakin hapus data?");
                                        if (confirmation) {
                                            window.location.href = "{{ url('rating/delete/' . $r->id) }}";
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
</div>

</div>
<!-- /.container-fluid -->
@endsection
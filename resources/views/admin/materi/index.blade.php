@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Materi</h1>
<p class="mb-4">Membantu dalam memanajemen materi pembelajaran.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Materi</h6>
        <br>
        <a href="{{ url('materi/create') }}">
        <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>BG Materi</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>BG Materi</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Level</th>
                        <th>Status</th>
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
                            @empty($m->bg_materi)
                                <img src="{{ url('admin/img/no_foto.png') }}"  width="60%" height="50%">
                            @else
                                <img src="{{ url('admin/img') }}/{{ $m->bg_materi }}"   width="60%" height="50%">
                            @endempty
                        </td>
                        <td>{{ $m->deskripsi }}</td>
                        <td>{{ number_format($m->harga, 0, ',', '.') }}</td>
                        <td>{{ $m->kategori }}</td>
                        <td>
                        @if($m->level == 'pemula')
                            <span class="btn btn-primary btn-sm" style="pointer-events: none;">{{ $m->level }}</span>
                        @elseif($m->level == 'menengah')
                            <span class="btn btn-warning btn-sm" style="pointer-events: none;">{{ $m->level }}</span>
                        @else
                            <span class="btn btn-danger btn-sm" style="pointer-events: none;">{{ $m->level }}</span>
                        @endif
                        </td>
                        <td>
                        @if($m->status == 'publik')
                            <span class="btn btn-success btn-sm" style="pointer-events: none;">{{ $m->status }}</span>
                        @else
                            <span class="btn btn-danger btn-sm" style="pointer-events: none;">{{ $m->status }}</span>
                        @endif
                        </td>
                        <td>
                            <form action="#" method="POST">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('materi/show/' . $m->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('materi/edit/' . $m->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $m->id }}">Hapus</button>

                                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            $('#confirmDeleteModal').on('show.bs.modal', function(event) {
                                                var button = $(event.relatedTarget);
                                                var userId = button.data('id');
                                                var deleteUrl = "{{ url('materi/delete') }}/" + userId;

                                                $('#confirmDeleteButton').off('click').on('click', function() {
                                                    window.location.href = deleteUrl;
                                                });
                                            });
                                        });
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
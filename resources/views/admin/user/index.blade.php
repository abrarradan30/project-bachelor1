@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel User</h1>
    <p class="mb-4">Menyimpan data deskripsi user. </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
            <br>
            <a href="{{ url('user/create') }}">
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
                            <th>Email</th>
                            <th>Deskripsi Diri</th>
                            <th>Foto</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Deskripsi Diri</th>
                            <th>Foto</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($user as $u)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->deskripsi_diri}}</td>
                            <td>
                                @empty($u->foto)
                                <img src="{{ url('admin/img/no_foto.png') }}" width="15%" style="width: 50px;">
                                @else
                                <img src="{{ url('admin/img') }}/{{ $u->foto }}" width="15%" style="width: 50px;">
                                @endempty
                            </td>
                            <td>
                                @if($u->role == 'admin')
                                <span class="btn btn-primary btn-sm" style="pointer-events: none;">{{ $u->role }}</span>
                                @elseif($u->role == 'mentor')
                                <span class="btn btn-info btn-sm" style="pointer-events: none;">{{ $u->role }}</span>
                                @else
                                <span class="btn btn-secondary btn-sm" style="pointer-events: none;">{{ $u->role }}</span>
                                @endif
                            <td>
                                <form action="#" method="POST">
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <a href="{{ url('user/edit/' . $u->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                    </button>
                
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $u->id }}">Hapus</button>

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
                                                var deleteUrl = "{{ url('user/delete') }}/" + userId;

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
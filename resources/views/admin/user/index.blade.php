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
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                                <script>                                  
                                    function confirmDelete() {
                                    var confirmation = confirm("Yakin hapus data?");
                                        if (confirmation) {
                                            window.location.href = "{{ url('user/delete/' . $u->id) }}";
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
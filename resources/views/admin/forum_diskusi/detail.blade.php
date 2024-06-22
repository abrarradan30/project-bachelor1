@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Forum Diskusi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach($forum_diskusi2 as $fd2)
        <h6 class="m-0 font-weight-bold text-primary">Forum Diskusi {{ $fd2->judul_materi }}</h6>
        @endforeach
        <br>
        <a href="{{ url('forum_diskusi/create') }}">
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
                        <th>Status Diskusi</th>
                        <th>Posting</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pertanyaan</th>
                        <th>Status Diskusi</th>
                        <th>Posting</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($forum_diskusi as $fd)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $fd->nama }}</td>
                        <td>{!! $fd->pertanyaan !!}</td>
                        <td>
                            @if($fd->status_diskusi == 'selesai')
                                <span class="btn btn-success btn-sm" style="pointer-events: none;">{{ $fd->status_diskusi }}</span>
                            @else
                                <span class="btn btn-danger btn-sm" style="pointer-events: none;">{{ $fd->status_diskusi }}</span>
                            @endif
                        </td>
                        <td>{{ $fd->created_at }}</td>
                        <td>
                            <form action="#" method="POST">
                                <!-- <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('forum_diskusi/show/' . $fd->id) }}" style="text-decoration: none; color: inherit;">Detail</a>
                                </button> -->
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('forum_diskusi/edit/' . $fd->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                                <script>                                  
                                    function confirmDelete() {
                                    var confirmation = confirm("Yakin hapus data?");
                                        if (confirmation) {
                                            window.location.href = "{{ url('forum_diskusi/delete/' . $fd->id) }}";
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
        <a href="{{ url('forum_diskusi') }}">
        <button class="btn btn-sm btn-secondary">Kembali</button>
        </a>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
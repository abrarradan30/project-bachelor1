@extends('frontend.index')

@section('content')
@include('sweetalert::alert')

@if(in_array(Auth::user()->role, ['admin', 'siswa', 'mentor']))

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>FORUM DISKUSI</h2>
        <p>Selamat datang di forum diskusi! Semoga Anda menikmati berdiskusi di sini dan mendapatkan banyak
            wawasan baru dari mentor dan sesama siswa/mahasiswa.</p>
    </div>
</div><!-- End Breadcrumbs -->

@foreach(range(1, 1) as $_)
<br>
@endforeach

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .inner-wrapper {
            position: relative;
            height: calc(100vh - 3.5rem);
            transition: transform 0.3s;
        }

        @media (min-width: 992px) {
            .sticky-navbar .inner-wrapper {
                height: calc(100vh - 3.5rem - 48px);
            }
        }

        .inner-main,
        .inner-sidebar {
            position: absolute;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
        }

        .inner-sidebar {
            left: 0;
            width: 235px;
            border-right: 1px solid #cbd5e0;
            background-color: #fff;
            z-index: 1;
        }

        .inner-main {
            right: 0;
            left: 235px;
        }

        .inner-main-footer,
        .inner-main-header,
        .inner-sidebar-footer,
        .inner-sidebar-header {
            height: 3.5rem;
            border-bottom: 1px solid #cbd5e0;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            flex-shrink: 0;
        }

        .inner-main-body,
        .inner-sidebar-body {
            padding: 1rem;
            overflow-y: auto;
            position: relative;
            flex: 1 1 auto;
        }

        .inner-main-body .sticky-top,
        .inner-sidebar-body .sticky-top {
            z-index: 999;
        }

        .inner-main-footer,
        .inner-main-header {
            background-color: #fff;
        }

        .inner-main-footer,
        .inner-sidebar-footer {
            border-top: 1px solid #cbd5e0;
            border-bottom: 0;
            height: auto;
            min-height: 3.5rem;
        }

        @media (max-width: 767.98px) {
            .inner-sidebar {
                left: -235px;
            }

            .inner-main {
                left: 0;
            }

            .inner-expand .main-body {
                overflow: hidden;
            }

            .inner-expand .inner-wrapper {
                transform: translate3d(235px, 0, 0);
            }
        }

        .nav .show>.nav-link.nav-link-faded,
        .nav-link.nav-link-faded.active,
        .nav-link.nav-link-faded:active,
        .nav-pills .nav-link.nav-link-faded.active,
        .navbar-nav .show>.nav-link.nav-link-faded {
            color: #3367b5;
            background-color: #c9d8f0;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #467bcb;
        }

        .nav-link.has-icon {
            display: flex;
            align-items: center;
        }

        .nav-link.active {
            color: #467bcb;
        }

        .nav-pills .nav-link {
            border-radius: .25rem;
        }

        .nav-link {
            color: #4a5568;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <div class="container">
        <div class="main-body p-0">
            <div class="inner-wrapper">

                <div class="inner-sidebar" style="display: none;">

                    <div class="inner-sidebar-header justify-content-center">
                        <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal" data-target="#pertanyaanModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            TAMBAH DISKUSI
                        </button>
                    </div>


                    <div class="inner-sidebar-body p-0">
                        <div class="p-3 h-100" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -16px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 16px;">
                                                <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                    <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon active">Semua
                                                        Diskusi</a>
                                                    <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Selesai</a>
                                                    <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Belum Selesai</a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar" style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="inner-main">

                    <!-- <div class="inner-main-header">
                                <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#"
                                    data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                                <select id="materi_id" name="materi_id" class="custom-select custom-select-sm w-auto mr-1"
                                    style="width: 50%;">
                                    <option value="1">--- Pilih Materi ---</option>
                                    @foreach ($materi as $m)    
                                        <option value="{{ $m->id }}">{{ $m->judul }}</option>
                                    @endforeach
                                </select>

                                @for ($i = 0; $i < 3; $i++)
                                    &nbsp;
                                @endfor

                                <span class="input-icon input-icon-sm ml-auto w-auto" style="width: 100%;">
                                    <input type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Cari diskusi" />
                                </span>
                            </div> -->

                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

                        <a href="{{ url('forum') }}" class="btn btn-light btn-sm mb-3 has-icon"><i class="fa fa-arrow-left mr-2"></i>Back</a>

                        <!-- Balasan Diskusi -->
                        @foreach($forum_diskusi as $fd)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0)" class="card-link">
                                            <img src="{{ url('admin/img') }}/{{ $fd->foto }}" class="mr-3 rounded-circle" width="50" alt="User" />
                                        </a>
                                        &nbsp; &nbsp;
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-target=".forum-content" class="text-body">
                                                {{ $fd->nama }} &nbsp; &harr; &nbsp; {{ $fd->judul_materi }} </a>
                                        </h6>
                                    </div>
                                    <br>
                                    <div class="media-body">
                                        <a href="{{url('forum/show/' . $fd->id) }}" data-toggle="collapse" data-target=".forum-content" class="text-body"> {!! $fd->pertanyaan !!} </a>
                                        <p class="text-muted"><a href="javascript:void(0)"></a>
                                            <br>
                                            <span class="text-secondary font-weight-bold">{{ \Carbon\Carbon::parse($fd->created_at)->format('d-M-Y') }}</span>
                                        </p>
                                        <!-- @if($fd->status_diskusi == 'selesai')
                                                    <span class="btn btn-success btn-sm"
                                                        style="pointer-events: none;">{{ $fd->status_diskusi }}</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm"
                                                        style="pointer-events: none;">{{ $fd->status_diskusi }}</span>
                                                @endif -->
                                        <br> <br>
                                        @if($fd->status_diskusi == 'belum selesai')
                                        @if(Auth::id() == $fd->users_id)
                                        <form method="POST" action="/forum/update/{{ $fd->id }}">
                                            {{ csrf_field() }}
                                            @foreach ($ar_status_diskusi as $sd)
                                            @php
                                            $cek = ($sd == $fd->status_diskusi) ? "checked" : "";
                                            @endphp
                                            <div class="form-check">
                                                <input name="status_diskusi" id="status_diskusi_{{ $sd }}" type="radio" class="form-check-input" value="{{ $sd }}" {{ $cek }}>
                                                <label class="form-check-label" for="status_diskusi_{{ $sd }}">{{ $sd }}</label>
                                            </div>
                                            <br>
                                            @endforeach
                                            <p style="font-size: 11px;">*ubah pilihan "selesai" jika selesai dan submit</p>
                                            <button class="btn btn-success btn-sm" type="submit" title="submit selesai">
                                                <i class="fa fa-check-square" style="font-size: 25px;"></i>
                                            </button>
                                        </form>
                                        @else
                                            <span class="text-muted" style="display: none;">Anda tidak dapat mengubah status diskusi ini.</span>
                                        @endif
                                        @else
                                        <span class="btn btn-success btn-sm" style="pointer-events: none;">Selesai</span>
                                        @endif

                                        <div class="text-muted small text-center align-self-center">
                                            @if($fd->status_diskusi == 'belum selesai')
                                            <a href="javascript:void(0)" class="text-muted small" data-toggle="modal" data-target="#balasanModal">
                                                <h6>Balas</h6>
                                            </a>
                                            @elseif($fd->status_diskusi == 'selesai')
                                            <h6 class="text-muted small" style="display: none;">Balas</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach($balasan_diskusi as $bd)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0)" class="card-link">
                                            <img src="{{ url('admin/img') }}/{{ $bd->foto }}" class="mr-3 rounded-circle" width="50" alt="User" />
                                        </a>
                                        &nbsp; &nbsp;
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-target=".forum-content" class="text-body">
                                                {{ $bd->nama }} </a>
                                        </h6>
                                    </div>
                                    <br>
                                    <div class="media-body">
                                        <a data-toggle="collapse" data-target=".forum-content" class="text-body">
                                            {!! $bd->balasan !!} </a>
                                        <p class="text-muted"><a href="javascript:void(0)"></a>
                                            <br>
                                            <span class="text-secondary font-weight-bold">{{ \Carbon\Carbon::parse($bd->created_at)->format('d-M-Y') }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                                    <li class="page-item disabled">
                                        <span class="page-link has-icon"><i class="material-icons">
                                                <<< </i></span>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                    <li class="page-item"><span class="page-link">2</span></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link has-icon" href="javascript:void(0)"><i
                                                class="material-icons">>></i></a>
                                    </li>
                                </ul> -->

                    </div>


                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content" data-toggle="collapse" data-target=".forum-content">


                    </div>


                </div>

            </div>

            <div class="modal fade" id="pertanyaanModal" tabindex="-1" role="dialog" aria-labelledby="pertanyaanModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header d-flex align-items-center bg-primary text-white">
                                <h6 class="modal-title mb-0" id="pertanyaanModalLabel">Tambah Diskusi Baru</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" placeholder="nama" autofocus />
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="threadTitle">Judul Materi</label>
                                    <input type="text" class="form-control" id="threadTitle" placeholder="Pilih Judul" autofocus />
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <textarea class="form-control" id="pertanyaan" placeholder="Isi pertanyaan"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Post</button>
                            </div>
                            <script>
                                $('#pertanyaan').summernote({
                                    placeholder: 'Isi pertanyaan...',
                                    tabsize: 2,
                                    height: 150
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="balasanModal" tabindex="-1" role="dialog" aria-labelledby="balasanModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('forum_balas/store_balas') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-header d-flex align-items-center bg-primary text-white">
                                <h6 class="modal-title mb-0" id="balasanModalLabel">Balas pertanyaan</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="threadTitle">Pertanyaan</label>
                                    @foreach ($forum_diskusi as $fd)
                                    <textarea class="form-control summernote" id="forum_diskusi_id" name="forum_diskusi_id" readonly>{{ strip_tags($fd->pertanyaan) }}</textarea>
                                    <input type="hidden" name="forum_diskusi_id" value="{{ $fd->id }}">
                                    @endforeach
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="balasan">Balasan</label>
                                    <textarea class="form-control" id="balasan" name="balasan" placeholder="Isi balasan"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Balas</button>
                            </div>
                        </form>
                        <script>
                            $('#balasan').summernote({
                                placeholder: 'Isi balasan...',
                                tabsize: 2,
                                height: 150
                            });
                        </script>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

    @foreach(range(1, 1) as $_)
    <br>
    @endforeach

</body>

</html>

@else
@include('auth.login')
@endif

@endsection
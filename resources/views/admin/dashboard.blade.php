@extends('admin.layout.appadmin')
@section('content')

@if(in_array(Auth::user()->role, ['admin', 'mentor']))
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @if(Auth::check() && Auth::user()->role == 'admin')
    <!-- Content Row Admin -->
    <div class="row">

        <!-- Data User -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('user') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 15px;">Tabel User</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data : {{ $users }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Materi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('materi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 15px;">Tabel Materi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data : {{ $materi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Detail Materi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('detail_materi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 15px;">Tabel Detail Materi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $detail_materi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Pembayaran -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('pembayaran') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 15px;">Tabel Pembayaran</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $pembayaran }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Progres Belajar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('progres_belajar') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 15px;">Tabel Progres Belajar</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $progres_belajar }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Kuis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('kuis') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 15px;">Tabel Kuis</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data : {{ $kuis }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bars fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Hasil Kuis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('hasil_kuis') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 15px;">Tabel Hasil Kuis</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $hasil_kuis }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-flag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Rating -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('rating') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 15px;">Tabel Rating</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $rating }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-star fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Sertifikat -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('sertifikat') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 15px;">Tabel Sertifikat</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $sertifikat }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Forum Diskusi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('forum_diskusi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 15px;">Tabel Forum Diskusi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $forum_diskusi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Balasan Diskusi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('balasan_diskusi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 15px;">Tabel Balasan Diskusi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $balasan_diskusi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    @elseif(Auth::check() && Auth::user()->role == 'mentor')
    <!-- Content Row Mentor -->
    <div class="row">

        <!-- Data Materi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('materi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 15px;">Tabel Materi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data : {{ $materi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Detail Materi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('detail_materi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 15px;">Tabel Detail Materi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $detail_materi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Progres Belajar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('cek_progres') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 15px;">Tabel Progres Belajar</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $progres_belajar }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Kuis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('kuis') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 15px;">Tabel Kuis</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data : {{ $kuis }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bars fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Hasil Kuis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('hasil_kuis') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 15px;">Tabel Hasil Kuis</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $hasil_kuis }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-flag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Rating -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('rating') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 15px;">Tabel Rating</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $rating }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-star fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Sertifikat -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('sertifikat') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 15px;">Tabel Sertifikat</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $sertifikat }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Forum Diskusi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('forum_diskusi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 15px;">Tabel Forum Diskusi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $forum_diskusi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Data Balasan Diskusi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('balasan_diskusi') }}" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 15px;">Tabel Balasan Diskusi</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data :
                                            {{ $balasan_diskusi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    @endif

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Overview Materi Diambil</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Cek :</div>
                            <a class="dropdown-item" href="{{ url('cek_progres') }}">Detail</a>
                            <!-- <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="ambilMateriChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart User -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik User</h6>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Cek :</div>
                            <a class="dropdown-item" href="{{ url('user') }}">Detail</a>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChartRole"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Admin
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Siswa
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Mentor
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
@endif

@if(Auth::check() && Auth::user()->role == 'siswa')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Welcome {{ Auth::user()->name }} !</h1>
    <p class="mb-4">Mari mulai perjalanan belajar yang menyenangkan. </p>

    <!-- Form Profil Pengguna -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
        </div>
        <div class="card-body">
            <form>
                <!-- Input Foto -->
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <br>
                    @if(Auth::user()->foto)
                    <img src="{{ asset('admin/img/' . Auth::user()->foto) }}" alt="User Photo" width="10%" height="15%">
                    @else
                    <img src="{{ asset('admin/img/no_foto.png') }}" alt="User Photo" width="10%" height="15%">
                    @endif
                </div>

                <!-- Input Nama -->
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="name" name="nama" value="{{ Auth::user()->name }}" readonly>
                </div>

                <!-- Input Nama -->
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" value="{{ Auth::user()->role }}" readonly>
                </div>


                <!-- Submit Button -->
                <button type="button" class="btn btn-info btn-sm">
                    <a href="{{ url('profil')}}" style="text-decoration: none; color: inherit;">Detail</a>
                </button>
            </form>
        </div>
    </div>
</div>
@endif

<script>
    var judulMateri = @json($ar_cek_progres->pluck('judul'));
    var userCounts = @json($ar_cek_progres->pluck('user_count'));

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#ambilMateriChart'), {
            type: 'line',
            data: {
                labels: judulMateri,
                datasets: [{
                    label: "Jumlah Pengambil",
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(2,117,216,1)",
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: userCounts,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: Math.max(...userCounts) + 1,
                            maxTicksLimit: 5,
                            callback: function(value, index, values) {
                                return value;
                            }
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            return "Jumlah Pengambil : " + tooltipItem.yLabel;
                        }
                    }
                },
            }
        });
    });
</script>

<!-- Chart Role -->
<script>
    var lbl_role = [
        @foreach ($ar_role as $role)
            '{{ $role->role }}',
        @endforeach
    ];
    var jml_role = [
        @foreach ($ar_role as $role)
            {{ $role->jumlah }},
        @endforeach
    ];
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPieChartRole'), {
            type: 'pie',
            data: {
                labels: lbl_role,
                datasets: [{
                    data: jml_role,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });
</script>

@endsection
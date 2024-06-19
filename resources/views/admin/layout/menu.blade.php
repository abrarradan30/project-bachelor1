@if(in_array(Auth::user()->role, ['admin', 'siswa', 'mentor']))
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3"><img src="{{ asset('admin/img/logo_lms.png')}}" alt="logo_lms" height="30px"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(in_array(Auth::user()->role, ['admin', 'mentor']))
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif

    @if(Auth::check() && Auth::user()->role == 'siswa')
    <!-- Nav Item - Profil Saya -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profil Saya</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if(in_array(Auth::user()->role, ['admin', 'mentor']))
    <!-- Heading -->
    <div class="sidebar-heading">
        Tabel
    </div>
    @endif

    @if(in_array(Auth::user()->role, ['admin', 'mentor']))
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <a class="collapse-item" href="{{ url('user') }}">User</a>
                    <a class="collapse-item" href="{{ url('materi') }}">Materi</a>
                @elseif(Auth::check() && Auth::user()->role == 'mentor')
                    <a class="collapse-item" href="{{ url('materi') }}">Materi</a>
                @endif
            </div>
        </div>
    </li>
    @endif

    @if(in_array(Auth::user()->role, ['admin', 'mentor']))
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                @if(Auth::check() && Auth::user()->role == 'admin')
                <a class="collapse-item" href="{{ url('detail_materi') }}">Detail Materi</a>
                <a class="collapse-item" href="{{ url('pembayaran') }}">Pembayaran</a>
                <a class="collapse-item" href="{{ url('transactions') }}">Transaksi</a>
                <a class="collapse-item" href="{{ url('progres_belajar') }}">Progres Belajar</a>
                <a class="collapse-item" href="{{ url('cek_progres') }}">Cek Progres Belajar</a>
                <a class="collapse-item" href="{{ url('kuis') }}">Kuis</a>
                <a class="collapse-item" href="{{ url('hasil_kuis') }}">Hasil Kuis</a>
                <a class="collapse-item" href="{{ url('rating') }}">Rating</a>
                <a class="collapse-item" href="{{ url('sertifikat') }}">Sertifikat</a>
                <a class="collapse-item" href="{{ url('forum_diskusi') }}">Forum Diskusi</a>
                <a class="collapse-item" href="{{ url('balasan_diskusi') }}">Balasan Diskusi</a>
                @elseif(Auth::check() && Auth::user()->role == 'mentor')
                <a class="collapse-item" href="{{ url('detail_materi') }}">Detail Materi</a>    
                <a class="collapse-item" href="{{ url('cek_progres') }}">Cek Progres Belajar</a>
                <a class="collapse-item" href="{{ url('kuis') }}">Kuis</a>
                <a class="collapse-item" href="{{ url('hasil_kuis') }}">Hasil Kuis</a>
                <a class="collapse-item" href="{{ url('rating') }}">Rating</a>
                <a class="collapse-item" href="{{ url('sertifikat') }}">Sertifikat</a>
                <a class="collapse-item" href="{{ url('forum_diskusi') }}">Forum Diskusi</a>
                <a class="collapse-item" href="{{ url('balasan_diskusi') }}">Balasan Diskusi</a>
                @endif
            </div>
        </div>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif

    @if(in_array(Auth::user()->role, ['admin', 'siswa']))
    <!-- Heading -->
    <div class="sidebar-heading">
        Aktivitas
    </div>
    @endif

    @if(in_array(Auth::user()->role, ['siswa']))
    <!-- Nav Item - Materi Saya -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('transactions') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span>
        </a>
    </li>
    @endif
    
    @if(in_array(Auth::user()->role, ['admin', 'siswa']))
    <!-- Nav Item - Materi Saya -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('progres_materi') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Materi-Ku</span>
        </a>
    </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
@endif
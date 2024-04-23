@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Cek Progres Belajar Siswa/Mahasiswa</h1>
<p class="mb-4">Halo {{ Auth::user()->name }} ! Cek sejauh mana kemajuan siswa/mahasiswa dalam mempelajari suatu materi. 
<a href="{{ url('forum') }}" style="text-decoration: none; color: inherit;"> Cek juga <b class="text-warning"> forum diskusi </b> </a>.
</p>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        @foreach($cek_progres->take(10) as $cp)
        <div class="col-xl-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 20px;">Progres Belajar &#10154; &nbsp; {{ $cp->nama }}</div>
                        </div>
                        <div class="col-auto ml-auto">
                            <a href="{{ url('progres_materi') }}">
                                <button class="btn btn-primary">Cek Progres</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>


</div>
<!-- /.container-fluid -->
@endsection
@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Progres Belajar &raquo; {{ auth()->user()->name }} </h1>

@if(in_array(Auth::user()->role, ['admin', 'siswa']))
    <p class="mb-4">Halo {{ Auth::user()->name }} ! Ayo selesaikan materi-<b>Mu</b> dengan semangat dan tekad. 
        Jangan ragu untuk bertanya dan berkolaborasi pada 
        <a href="{{ url('forum') }}" style="text-decoration: none; color: inherit;"> <b class="text-warning"> forum diskusi </b> </a>.
    </p>
@endif

<!-- @if(in_array(Auth::user()->role, ['admin', 'mentor']))
<button type="button" class="btn btn-danger">
    <a href="{{ url('cek_progres') }}" style="text-decoration: none; color: inherit;"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</a>
</button>
@endif -->

@foreach(range(1, 2) as $_) 
    <br>
@endforeach

    <!-- Content Row -->
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    @foreach($ar_progres_materi as $ar_pm)
    <div class="col-xl-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 20px;">{{ $ar_pm->judul }}</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ar_pm->progres }} %</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ $ar_pm->progres }}%" aria-valuenow="{{ $ar_pm->progres }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
        <div class="col-auto ml-auto">
            <button class="btn btn-primary">
                <a href="{{ url('modul/show/'.$ar_pm->id) }}" style="text-decoration: none; color: inherit;">Lanjutkan</a>
            </button>
            <br> <br>
            <button class="btn btn-warning">
                <a href="{{ url('input_sertifikat/create/'.$ar_pm->id) }}" style="text-decoration: none; color: inherit;">Sertifikat</a>
            </button>
        </div>
    </div>
    </div>
    @endforeach
    
    </div>


</div>
<!-- /.container-fluid -->
@endsection
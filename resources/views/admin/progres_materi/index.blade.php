@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Progres Belajar &raquo; {{ auth()->user()->name }}</h1>

<!-- Content Row -->
<div class="row">

@if($ar_progres_materi->isEmpty())
    <div class="col-xl-12 mb-4">
        <p align="center"> Anda belum memiliki materi? Cari materi
            <a href="{{ url('course') }}" style="text-decoration: none; color: inherit;">
                <b class="text-warning">di sini</b>
            </a>.
        </p>
    </div>
@else
    <div class="col-xl-12 mb-4">
        <p class="mb-4">Halo {{ Auth::user()->name }}! Ayo selesaikan materi-<b>mu</b>. Jangan ragu untuk bertanya dan berkolaborasi di
            <a href="{{ url('forum') }}" style="text-decoration: none; color: inherit;">
                <b class="text-warning">forum diskusi</b>
            </a>.
            Atau cari materi lainnya
            <a href="{{ url('course') }}" style="text-decoration: none; color: inherit;">
                <b class="text-primary">di sini</b>
            </a>.
        </p>
    </div>

    <!-- Materi dimiliki -->
    @foreach($ar_progres_materi as $ar_pm)
        <div class="col-xl-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 20px;">
                                {{ $ar_pm->judul }}
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ar_pm->progres }}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $ar_pm->progres }}%" aria-valuenow="{{ $ar_pm->progres }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="ml-auto">
                            <a href="{{ url('modul/show/'.$ar_pm->materi_id) }}" class="btn btn-primary btn-sm">
                                Lanjutkan &nbsp; <i class="fa fa-chevron-circle-right"></i>
                            </a>
                            <a href="{{ url('input_sertifikat/create/'.$ar_pm->materi_id) }}" class="btn btn-warning btn-sm ml-2">
                                Sertifikat &nbsp; <i class="fa fa-certificate"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

</div>

</div>
<!-- /.container-fluid -->
@endsection

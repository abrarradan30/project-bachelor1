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
            <br>
            Panduan mempelajari modul materi, klik disini
            <a href="#" style="text-decoration: none; color: inherit;" data-toggle="modal" data-target="#alertModul">
                <b class="text-primary">di sini</b>
            </a>.
            <!-- Modal -->
            <div class="modal fade" id="alertModul" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alertModalLabel">Panduan mempelajari modul materi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>1. Klik <a href="#" class="btn btn-primary btn-sm" style="pointer-events: none;">
                                Lanjutkan &nbsp; <i class="fa fa-chevron-circle-right"></i>
                                </a> pada awal tampilan materi yang anda miliki </p>
                            <p>2. Klik down-up pada tampilan modul materi, untuk melihat isi modul</p>
                            <p>3. Klik <button type="submit" class="btn btn-secondary btn-sm lanjut-btn" style="pointer-events: none;">Lanjut &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
                             pada setiap modul (jika modul sudah Anda anggap paham)</p>
                            <p>4. <button type="button" class="btn btn-success btn-sm selesai-btn" style="pointer-events: none;">Selesai <i class="fa fa-check-circle"></i></button>
                             akan ditampilkan pada setiap modul yang Anda anggap paham (termasuk progres belajar Anda)</p>
                            <p>5. Jika dirasa ada modul yang kurang paham, maka Anda dapat bertanya pada <b style="color: orange;">forum diskusi</b> </p>
                            <p>6. Jika progres belajar Anda sudah mencapai 100 %, maka anda dapat mengerjakan kuis pada menu 
                                <a href="#" class="btn btn-info btn-sm" style="pointer-events: none;">
                                Mulai Kuis &nbsp; <i class="fa fa-list"></i>
                            </a></p>
                            <p>7. Kerjakan kuis hingga mencapai skor yang ditetapkan / "Lulus"</p>
                            <p>8. Jika "Lulus", silahkan Anda berikan <a href="#" class="btn btn-warning btn-sm" style="pointer-events: none;">
                                Rating <i class="fa fa-star"></i>
                                </a>
                                 yang telah disediakan pada menu kuis</p>
                            <p>9. Terakhir, Anda bisa mencetak sertifikat penyelesaian materi pada <a href="#" class="btn btn-warning btn-sm ml-2" style="pointer-events: none;">
                                Sertifikat &nbsp; <i class="fa fa-certificate"></i>
                            </a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ min(floor($ar_pm->total_progres), 100) }} %</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $ar_pm->total_progres }}%" aria-valuenow="{{ $ar_pm->total_progres }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                            @if($ar_pm->total_progres >= 100 && $ar_pm->skor_akhir >= 60)
                            <a href="{{ url('modul/show/'.$ar_pm->materi_id) }}" class="btn btn-primary btn-sm">
                                Modul &nbsp; <i class="fa fa-chevron-circle-right"></i>
                            </a>
                            <a href="{{ url('input_sertifikat/create/'.$ar_pm->materi_id) }}" class="btn btn-warning btn-sm ml-2" target="_blank">
                                Sertifikat &nbsp; <i class="fa fa-certificate"></i>
                            </a>
                            @else
                            <a href="{{ url('modul/show/'.$ar_pm->materi_id) }}" class="btn btn-primary btn-sm">
                                Lanjutkan &nbsp; <i class="fa fa-chevron-circle-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-xl-12 mb-4 text-center">
        @if ($ar_progres_materi->onFirstPage())
            <span class="btn btn-secondary disabled"><<</span>
        @else
            <a href="{{ $ar_progres_materi->previousPageUrl() }}" class="btn btn-secondary"><<</a>
        @endif

        @if ($ar_progres_materi->hasMorePages())
            <a href="{{ $ar_progres_materi->nextPageUrl() }}" class="btn btn-secondary">>></a>
        @else
            <span class="btn btn-secondary disabled">>></span>
        @endif
    </div>

@endif

</div>

</div>
<!-- /.container-fluid -->
@endsection

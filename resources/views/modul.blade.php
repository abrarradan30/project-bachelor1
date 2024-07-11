@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    @foreach($judul as $jd)
    <h1 class="h3 mb-2 text-gray-800">{{ $jd->judul }} / Level {{ $jd->level }} </h1>
    @endforeach

    <p class="mb-4"> Punya pertanyaan ?
        <a href="{{ url('forum') }}" style="text-decoration: none; color: inherit;"> klik <b class="text-warning"> disini </b></a>.
    </p>

    <!-- Detail Materi -->
    @foreach ($sub_judul as $sub)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modul {{ $loop->iteration }}. {{ $sub }}</h6>
        </div>
        <div class="card-body" style="display: none;">
            <div class="form-group">
                <p>{!! $isi_materi[$sub] !!}</p>
                @if(isset($progres_materi[$sub]) && $progres_materi[$sub])
                    <button type="button" class="btn btn-success btn-sm selesai-btn" style="pointer-events: none;">Selesai <i class="fa fa-check-circle"></i></button>
                @else
                    <form action="{{ route('update.progres') }}" method="POST" class="progres-form">
                        @csrf
                        <input type="hidden" name="materi_id" value="{{ $modul[0]->materi_id }}">
                        <input type="hidden" name="modul_id" value="{{ $id_materi[$sub] }}">
                        <button type="submit" class="btn btn-secondary btn-sm lanjut-btn">Lanjut &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
                    </form>
                @endif
            </div>
        </div>
        <div class="card-header py-2">
            <i class="fa fa-chevron-circle-down fa-2x chevron-down" style="cursor: pointer;"></i>
            <i class="fa fa-chevron-circle-up fa-2x chevron-up" style="cursor: pointer; display: none;"></i>
        </div>
    </div>
    @endforeach

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kuis</h6>
        </div>
        <div class="card-body" style="display: none;">
            <div class="form-group">
                <p>
                    Untuk menguji pengetahuan Anda tentang seluruh materi yang telah dipelajari,
                    terdapat beberapa pertanyaan yang harus dikerjakan dalam kuis ini.
                </p>
                <p>
                    Syarat skor "Lulus" >= 60 %, Jika status <b>gagal</b>, maka Anda harus mmengulang pengerjaan kuis kembali.
                </p>
                <hr>
                @php
                $skor = 0;
                $status = 'Gagal';
                if ($skor_akhir && $skor_akhir->skor >= 60) {
                    $skor = $skor_akhir->skor;
                    $status = 'Lulus';
                } elseif ($skor_akhir) {
                    $skor = $skor_akhir->skor;
                }
                @endphp
                <p>Skor anda : <span id="quiz-score">{{ $skor }} %</span></p>
                <p>Status : <b>{{ $status }}</b> </p>

                @foreach($modul as $md)
                    @if($status === 'Lulus')
                        <a href="{{ url('ratingfe/create/'.$md->id) }}" class="btn btn-warning btn-sm">
                            Rating <i class="fa fa-star"></i>
                        </a>
                    @else
                        @if($total_progres >= 100)
                            <a href="{{ url('soal_kuis/show/'.$md->id) }}" class="btn btn-info btn-sm">
                                Mulai Kuis &nbsp; <i class="fa fa-list"></i>
                            </a>
                        @else
                            <a href="javascript:void(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#alertModal">
                                Mulai Kuis &nbsp; <i class="fa fa-list"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="alertModalLabel">Pemberitahuan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>Selesaikan semua modul materi yang tersedia !</b> agar dapat memulai kuis.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        @endif
                    @endif
                @endforeach

            </div>

            <div class="form-group">

            </div>
        </div>
        <div class="card-header py-2">
            <i class="fa fa-chevron-circle-down fa-2x chevron-down" style="cursor: pointer;"></i>
            <i class="fa fa-chevron-circle-up fa-2x chevron-up" style="cursor: pointer; display: none;"></i>
        </div>
    </div>

    <br>

</div>
<!-- /.container-fluid -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all card elements
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const chevronDown = card.querySelector('.chevron-down');
            const chevronUp = card.querySelector('.chevron-up');
            const cardBody = card.querySelector('.card-body');

            // Event listener for chevron down icon
            chevronDown.addEventListener('click', function() {
                cardBody.style.display = 'block';
                chevronDown.style.display = 'none';
                chevronUp.style.display = 'inline';
            });

            // Event listener for chevron up icon
            chevronUp.addEventListener('click', function() {
                cardBody.style.display = 'none';
                chevronUp.style.display = 'none';
                chevronDown.style.display = 'inline';
            });
        });
    });
</script>

@endsection
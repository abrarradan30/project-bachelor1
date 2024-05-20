@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
@foreach($judul as $jd)
<h1 class="h3 mb-2 text-gray-800">{{ $jd->judul }} / Level {{ $jd->level }} </h1>
@endforeach

@if(in_array(Auth::user()->role, ['admin', 'siswa']))
    <p class="mb-4"> Punya pertanyaan ? &nbsp;
        <a href="{{ url('forum') }}" style="text-decoration: none; color: inherit;"> <b class="text-warning"> forum diskusi </b> </a>.
    </p>
@endif

<!-- Detail Materi -->
@foreach ($sub_judul as $sub)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modul {{ $sub }}</h6>
    </div>
    <div class="card-body" style="display: none;">
        <div class="form-group">
            <p>{!! $isi_materi[$sub] !!}</p>
        </div>

        <div class="form-group">
            <a href="{{ url('progres_materi') }}" class="btn btn-secondary btn-sm">
                Lanjut &nbsp; <i class="fa fa-chevron-circle-right"></i>
            </a>
            <a href="{{ url('progres_materi') }}" class="btn btn-success btn-sm">
                Selesai <i class="fa fa-check-circle"></i>
            </a>
        </div>
    </div>
    <div class="card-header py-2">
        <i class="fa fa-chevron-circle-down fa-2x chevron-down" style="cursor: pointer;"></i>
        <i class="fa fa-chevron-circle-up fa-2x chevron-up" style="cursor: pointer; display: none;"></i>
    </div>
</div>
@endforeach
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
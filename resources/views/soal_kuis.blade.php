@extends('admin.layout.appadmin')

@section('content')

<style>
.question {
    margin-bottom: 20px;
  }
.options {
    margin-top: 10px;
  }
label {
    display: block;
    margin-bottom: 5px;
  }
input[type="radio"] {
    margin-right: 5px;
  }
input[type="radio"]:checked+label {
    font-weight: bold;
  }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
@foreach($soal_kuis as $sk)
<h1 class="h3 mb-2 text-gray-800">Kuis {{ $sk->judul }} / {{ $sk->level }}</h1>
@endforeach

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kerjakan dengan teliti dan sungguh-sungguh!</h6>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ url('kuis_front/store') }}">
      {{ csrf_field() }} 

      <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
      <input type="hidden" name="materi_id" value="{{ $isi_kuis[0]->materi_id }}">

        <div class="question">

            @foreach($isi_kuis as $ik)
            <h6> {{ $loop->iteration }}.{!! $ik->soal !!}</h6>
              <div class="options">
                <label><input type="radio" name="q{{ $ik->id }}" value="a"> a. {!! $ik->a !!} </label><br>
                <label><input type="radio" name="q{{ $ik->id }}" value="b"> b. {!! $ik->b !!} </label><br>
                <label><input type="radio" name="q{{ $ik->id }}" value="c"> c. {!! $ik->c !!} </label><br>
                <label><input type="radio" name="q{{ $ik->id }}" value="d"> d. {!! $ik->d !!} </label><br>
              </div> 

            @endforeach
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info btn-sm">Selesai <i class="fa fa-flag-checkered"></i></button>
        </div>
      </form>
    </div>
    
</div>

</div>
<!-- /.container-fluid -->

@endsection
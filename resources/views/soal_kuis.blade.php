@extends('modul_materi.index')

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

<body class="services-details-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header sticky-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
    
      <a class="btn-getstarted"href="{{ url('progres_materi') }}">Materi-Ku</a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
      
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    @foreach($soal_kuis as $sk)
    <!-- Page Title -->
    <div data-aos="fade" class="page-title">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li>Kuis Materi {{ $sk->judul }} </li>
            <li class="current">Level {{ $sk->level }} </li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details">

      <div class="container">

        <div class="row gy-5">

          

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <div class="question">
              @php 
                $no = 1;
              @endphp

              @foreach($soal_kuis as $sk)
              <h3>{{ $no }}. {!! $sk->soal !!}</h3>
              <div class="options">
                <label><input type="radio" name="q1" value="a">a) {!! $sk->a !!} </label><br>
                <label><input type="radio" name="q1" value="b">b) {!! $sk->b !!} </label><br>
                <label><input type="radio" name="q1" value="c">c) {!! $sk->c !!} </label><br>
                <label><input type="radio" name="q1" value="d">d) {!! $sk->d !!} </label><br>
              </div>

              @php 
                $no++;
              @endphp

              @endforeach
            </div>
            <button class="btn btn-success">Selesai</button>
          </div>

        </div>

      </div>

    </section><!-- End Service-details Section -->

  @endforeach
  </main>

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

</body>

@endsection
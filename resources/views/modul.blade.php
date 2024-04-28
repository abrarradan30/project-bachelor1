@extends('modul_materi.index')

@section('content')

<body class="services-details-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header sticky-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
    
      <a class="btn-getstarted" href="{{ url('progres_belajar') }}">Materi-Ku</a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
      
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

  @foreach($modul as $md)
    <!-- Page Title -->
    <div data-aos="fade" class="page-title">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li>Materi {{ $md->judul }}</li>
            <li class="current">Level {{ $md->level }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Modul</h4>
              <div class="services-list">
              @foreach($sub_judul as $sub)
                <a href="{{ url('modul/show/'.$sub) }}"><i class="bi bi-check-circle-fill" style="color: green;"></i><span>{{ $sub }}</span></a>
              @endforeach
                <a href="#" id="show-kuis"><i class="bi bi-arrow-right-circle"></i><span>Kuis</span></a>
              </div>
            </div>

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-question-circle-fill" style="font-size: 4em;"></i>
              <br>
              <h4>Punya pertanyaan ?</h4>
              <p class="d-flex align-items-center mt-1 mb-0"> <a href="{{ url('forum') }}"> <i class="bi bi-chat-dots-fill"></i> forum diskusi</a></span></p>
            </div>

          </div>

          @foreach($isi_materi as $im)
          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <div class="materi">
              <p>
                {!! $im->isi_materi !!}
              </p>
              <div class="d-flex justify-content-between align-items-center" style="background-color: #DCDCDC; padding: 10px;">
                <h5>Lanjut materi ?</h5>
                <button type="button" class="btn btn-success btn-sm">
                  <a href="#" style="text-decoration: none; color: inherit;">Lanjut <i class="bi bi-caret-right-fill"></i></a>
                </button>
              </div>
            </div>

            <div class="kuis" style="display: none;">
              <p>
                Untuk menguji pengetahuan Anda tentang seluruh materi yang telah dipelajari,
                terdapat beberapa pertanyaan yang harus dikerjakan dalam kuis ini.
              </p>
              <p> 
                Syarat skor lulus = 75%, Jika gagal, maka Anda harus mmengulang pengerjaan kuis kembali.
              </p>
              <button id="restart-btn" class="btn btn-success">
                <a href="{{ url('soal_kuis') }}" style="text-decoration: none; color: inherit;">Mulai Kuis!</a>
              </button>
              <p></p>
              <p>Skor anda : <span id="quiz-score">0%</span></p>
              <p>Status : Gagal</p>
              <button id="restart-btn" class="btn btn-warning">Cetak Sertifikat</button>
            </div>
          </div>
          @endforeach

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("show-kuis").addEventListener("click", function() {
            document.querySelector(".materi").style.display = "none";
            document.querySelector(".kuis").style.display = "block";
        });
        document.getElementById("show-kuis-btn").addEventListener("click", function() {
            document.querySelector(".materi").style.display = "none";
            document.querySelector(".kuis").style.display = "block";
        });
    });
</script>

@endsection
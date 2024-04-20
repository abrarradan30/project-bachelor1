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

    <!-- Page Title -->
    <div data-aos="fade" class="page-title">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li>Materi </li>
            <li class="current">Level </li>
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
                <a href="#"><i class="bi bi-check-circle-fill" style="color: green;"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Kuis</span></a>
              </div>
            </div><!-- End Services List -->

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-question-circle-fill" style="font-size: 4em;"></i>
              <br>
              <h4>Punya pertanyaan ?</h4>
              <p class="d-flex align-items-center mt-1 mb-0"> <a href="{{ url('forum') }}"> <i class="bi bi-chat-dots-fill"></i> forum diskusi</a></span></p>
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('modul_materi/assets/img/services.jpg') }}" alt="" class="img-fluid services-img">
            <p>
              Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. 
              Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. 
              Dolorem architecto eum et quos deleniti officia qui.
            </p>
            <div>
              <hr>
              <p>
                Untuk menguji pengetahuan Anda tentang seluruh materi yang telah dipelajari,
                terdapat beberapa pertanyaan yang harus dikerjakan dalam kuis ini.
              </p>
              <p> 
                Syarat skor lulus = 75%, Jika gagal, maka Anda harus mmengulang pengerjaan kuis kembali.
              </p>
              <button id="restart-btn" class="btn btn-success">
                <a href="{{ url('kuis') }}" style="text-decoration: none; color: inherit;">Mulai Kuis!</a>
              </button>
              <p></p>
              <p>Skor anda : <span id="quiz-score">0%</span></p>
              <p>Status : Gagal</p>
              <button id="restart-btn" class="btn btn-warning">Cetak Sertifikat</button>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Service-details Section -->

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
@extends('frontend.index')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Belajar Hari Ini,<br>Berani Mengambil Tantangan Esok Hari</h1>
      <h2>Kalian adalah Pemimpin Masa Depan !</h2>
      <a href="{{url('course')}}" class="btn-get-started">Get Started</a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('frontend/assets/img/front_about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Manfaat LMS</h3>
            <p class="fst-italic">
              Sebagai upaya peningkatan pengalaman belajar, LMS ini buat dengan interaktif dan responsif untuk kebutuhan belajar siswa/mahasiswa.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Aksesibilitas materi, impelementasi LMS dapat memfasilitasi belajar mandiri dan menghilangkan hambatan terkait aksesibilitas materi bagi siswa/mahasiswa.</li>
              <li><i class="bi bi-check-circle"></i> Fleksibilitas waktu dan tempat, dengan LMS siswa/mahasiswa tidak terbatas pada jadwal kelas dan ruang fisik.</li>
              <li><i class="bi bi-check-circle"></i> Pelacakan kemajuan, LMS terdapat pelacakan kemajuan individu siswa/mahasiswa.</li>
              <li><i class="bi bi-check-circle"></i> Materi pembelajaran yang disimpan dalam bentuk digital di LMS relatif lebih aman dan terhindar dari risiko kerusakan.</li>
            </ul>
            <p>
              Selamat belajar dan semoga setiap langkah yang diambil di dalam platform ini membawa kesuksesan dan pencapaian yang gemilang dalam perjalanan akademis dan profesional kalian!
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">
          <div class="col-lg-4 col-6 text-center">
            <span>{{ $users }}</span>
            <p>Siswa/Mahasiswa</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span>{{ $materi }}</span>
            <p>Materi</p>
          </div>
          
          <div class="col-lg-4 col-6 text-center">
            <span>{{ $forum_diskusi }}</span>
            <p>Diskusi</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose LMS?</h3>
              <p>
              LMS membantu meningkatkan kualitas dan efektivitas pembelajaran, serta mempersiapkan siswa/mahasiswa untuk tuntutan masa depan 
              dengan memberikan pengalaman belajar yang lebih interaktif, terstruktur, dan dapat dipersonalisasi.
              </p>
              <div class="text-center">
                <a href="{{url('about')}}" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-book-content"></i>
                    <h4>Konten yang Terkini</h4>
                    <p>Materi pembelajaran terkini sesuai dengan perkembangan industri, sehingga siswa/mahasiswa dapat selalu mendapatkan informasi yang relevan dan up-to-date.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Konten Interaktif</h4>
                    <p>Materi LMS disajikan dalam format teks, gambar atau vidio </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-conversation"></i>
                    <h4>Kolaborasi dan Diskusi</h4>
                    <p>Melalui fitur forum diskusi siswa/mahasiswa dapat berinteraksi dengan sesama mereka dan dengan mentor.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Course Options Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Materi</h2>
          <p>
            <a href="{{ url('/course') }}">Pilihan Materi &#10148;</a>
          </p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          @foreach($ar_materi as $m)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <a href="{{url('course_detail/show/'.$m->id) }}" style="text-decoration: none; color: inherit;">
            <div class="course-item">
              @empty($m->bg_materi)
                <img src="{{ url('admin/img/no_foto.png') }}" width="100%">
              @else
                <img src="{{ url('admin/img') }}/{{ $m->bg_materi }}" width="100%">
              @endempty
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p>
								      @if($m->level == 'pemula')
                        <span class="btn btn-primary btn-sm" style="pointer-events: none;">{{ $m->level }}</span>
                      @elseif($m->level == 'menengah')
                        <span class="btn btn-warning btn-sm" style="pointer-events: none; color: white;">{{ $m->level }}</span>
                      @else
                        <span class="btn btn-danger btn-sm" style="pointer-events: none; color: white;">{{ $m->level }}</span>
                      @endif
								    </p>
                    <!-- <p class="price">Rp {{ $m->harga }}</p> -->
                    <p class="price">Rp {{ number_format($m->harga, 0, ',', '.') }}</p>
                </div>
                <h3>{{ $m->judul }}</h3>
              </div>
            </div>
          </a>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Course Option Section -->

  </main><!-- End #main -->

@endsection
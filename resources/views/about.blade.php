@extends('frontend.index')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Tentang</h2>
        <p>Kami adalah platform Pembelajaran Berbasis LMS yang bertujuan untuk meningkatkan pengalaman belajar siswa/mahasiswa.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
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

</main>
<!-- End #main -->

@endsection
@extends('frontend.index')

@section('content')

<main id="main" data-aos="fade-in">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Courses</h2>
    <p>Temukan beragam materi berkualitas untuk meningkatkan keterampilan Anda di berbagai bidang di halaman ini.</p>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Courses Section ======= -->
<section id="courses" class="courses">
  <div class="container" data-aos="fade-up">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
      <a href="{{ url('course_detail') }}" style="text-decoration: none; color: inherit;">
        <div class="course-item">
          <img src="{{ asset('frontend/assets/img/course-1.jpg') }}" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Pemula</h4>
              <p class="price">Rp 150.000</p>
            </div>
            <h3>Desain Web</h3>
          </div>
        </div>
      </a>
      </div>

    </div>

  </div>
</section><!-- End Courses Section -->

</main><!-- End #main -->

@endsection
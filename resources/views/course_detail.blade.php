@extends('frontend.index')

@section('content')

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>Course Detail</h2>
    <p>Selamat datang di halaman detail materi! Anda akan menemukan informasi lengkap tentang materi pembelajaran ini.</p>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
  <div class="container" data-aos="fade-up">

    <div class="row">
    @foreach($materi as $m)
      <div class="col-lg-8">
          @empty($m->bg_materi)
            <img src="{{ url('admin/img/no_foto.png') }}" width="100%">
          @else
            <img src="{{ url('admin/img') }}/{{ $m->bg_materi }}" width="100%">
          @endempty
        <h3>{{ $m->judul }}</h3>
        <p>{{ $m->deskripsi }}</p>
      </div>
      <div class="col-lg-4">

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Kategori</h5>
          <p>{{ $m->kategori }}</p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Level</h5>
          <p>{{ $m->level }}</p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Harga</h5>
          <p>Rp {{ number_format($m->harga, 0, ',', '.') }}</p>
        </div>

        <div class="text-left">
        <a href="{{ url('checkout/show/'.$m->id) }}" class="btn btn-primary">Beli Materi</a>
        </div>

      </div>
    @endforeach
    </div>

  </div>
</section><!-- End Cource Details Section -->

</main><!-- End #main -->

@endsection
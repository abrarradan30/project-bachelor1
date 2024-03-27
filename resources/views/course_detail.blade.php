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
      <div class="col-lg-8">
        <img src="{{asset('frontend/assets/img/course-details.jpg')}}" class="img-fluid" alt="">
        <h3>HTML</h3>
        <p>
          Qui et explicabo voluptatem et ab qui vero et voluptas. Sint voluptates temporibus quam autem. Atque nostrum voluptatum laudantium a doloremque enim et ut dicta. Nostrum ducimus est iure minima totam doloribus nisi ullam deserunt. Corporis aut officiis sit nihil est. Labore aut sapiente aperiam.
          Qui voluptas qui vero ipsum ea voluptatem. Omnis et est. Voluptatem officia voluptatem adipisci et iusto provident doloremque consequatur. Quia et porro est. Et qui corrupti laudantium ipsa.
          Eum quasi saepe aperiam qui delectus quaerat in. Vitae mollitia ipsa quam. Ipsa aut qui numquam eum iste est dolorum. Rem voluptas ut sit ut.
        </p>
      </div>
      <div class="col-lg-4">

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Kategori</h5>
          <p>IT</p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Level</h5>
          <p>Pemula</p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Harga</h5>
          <p>Rp 150.000</p>
        </div>

        <div class="text-left">
        <a href="{{ url('checkout') }}" class="btn btn-primary">Beli Materi</a>
        </div>

      </div>
    </div>

  </div>
</section><!-- End Cource Details Section -->

</main><!-- End #main -->

@endsection
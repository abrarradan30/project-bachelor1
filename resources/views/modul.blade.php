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
                <a href="#" class="active"><i class="bi bi-check-circle-fill" style="color: green;"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Product Management</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Graphic Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Marketing</span></a>
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
            <h3>Temporibus et in vero dicta aut eius lidero plastis trand lined voluptas dolorem ut voluptas</h3>
            <p>
              Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
            </ul>
            <p>
              Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
            </p>
            <p>
              Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque. Et ipsa perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum. Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae ipsum at consequatur vero. Architecto ut pariatur autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias explicabo ea.
            </p>
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
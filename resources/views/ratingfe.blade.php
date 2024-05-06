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
        font-weight: bold;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    input[type="radio"]:checked+label {
        font-weight: bold;
    }

    /* rating */
    .rating {
      display: flex;
  flex-direction: row-reverse;
  justify-content: left;
}

.rating > input{ display:none;}

.rating > label {
  position: relative;
    width: 1em;
    font-size: 3vw;
    color: #FFD600;
    cursor: pointer;
}
.rating > label::before{ 
  content: "\2605";
  position: absolute;
  opacity: 0;
}
.rating > label:hover:before,
.rating > label:hover ~ label:before {
  opacity: 1 !important;
}

.rating > input:checked ~ label:before{
  opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }

</style>

<body class="services-details-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <header id="header" class="header sticky-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a class="btn-getstarted" href="{{ url('progres_materi') }}">Materi-Ku</a>

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
              <ol>
                <li>Rating Materi </li>
                <li class="current">Level </li>
              </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details">

            <div class="container">
              <div class="card-body" style="background-color: #DCDCDC; margin: 5px; border-radius: 10px;">
                <h6> Berikan rating-mu untuk materi yang telah dipelajari! Feedback Anda sangat berarti untuk meningkatkan kualitas pembelajaran. </h6>
              </div>

              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

              <div class="card-body" style="background-color: #4682B4; margin: 5px; border-radius: 10px;">
                <form>
                    <div class="form-group row">
                        <label for="text" class="col-2 col-form-label">Nama</label>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                </div>
                                <input id="text" name="text" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="select" class="col-2 col-form-label">Materi</label>
                        <div class="col-8">
                            <select id="select" name="select" class="custom-select">
                                <option value="rabbit">Rabbit</option>
                                <option value="duck">Duck</option>
                                <option value="fish">Fish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2">Rating</label>
                        <div class="col-8">
                        <div class="rating">
                          <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                          <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                          <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                          <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                          <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="textarea" class="col-2 col-form-label">Feedback</label>
                        <div class="col-8">
                            <textarea id="textarea" name="textarea" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-2 col-8">
                            <button name="submit" type="submit" class="btn btn-warning">Send</button>
                        </div>
                    </div>
                </form>
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

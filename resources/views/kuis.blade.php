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
    
      <a class="btn-getstarted" href="{{ url('progres_belajar') }}">Materi-Ku</a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
      
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

    </div>
  </header><!-- End Header -->

  <main>
    <div class="question">
      <h2>Question 1:</h2>
      <p>What is the capital of France?</p>
      <div class="options">
        <label><input type="radio" name="q1" value="a">a) London</label><br>
        <label><input type="radio" name="q1" value="b">b) Paris</label><br>
        <label><input type="radio" name="q1" value="c">c) Berlin</label><br>
        <label><input type="radio" name="q1" value="d">d) Rome</label><br>
      </div>
    </div>
    <!-- Add more questions here -->
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
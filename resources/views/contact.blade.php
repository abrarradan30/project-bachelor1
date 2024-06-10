@extends('frontend.index')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Kontak</h2>
        <p>Kami siap membantu Anda dengan segala pertanyaan atau kebutuhan yang Anda miliki terkait dengan penggunaan dan manfaat dari platform LMS kami. 
            Jangan ragu untuk menghubungi kami, kami akan dengan senang hati memberikan bantuan yang Anda perlukan.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.6495319330225!2d112.61171361409358!3d-7.97863904353232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd628211f4820d7%3A0x5027a76e35654d0!2sMalang%2C%20Kota%20Malang%2C%20Jawa%20Timur%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1621844678879!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
      </div>



      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Malang, Jawa Timur, Indonesia</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>lms@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+62 8123 55488 55</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form method="POST" action="{{ url('contact/store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6 form-group">
                  <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name">
                  @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email">
                  @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group mt-3">
                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject">
                @error('subject')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="form-group mt-3">
                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Message"></textarea>
                  @error('message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
              </div>

              <br>
              <div class="text-center"><button type="submit" class="btn btn-primary">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection
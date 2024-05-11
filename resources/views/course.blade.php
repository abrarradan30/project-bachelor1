@extends('frontend.index')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
	<div class="container">
		<h2>Courses</h2>
		<p>Temukan beragam materi berkualitas untuk meningkatkan keterampilan Anda di berbagai bidang di halaman ini.</p>
	</div>
</div><!-- End Breadcrumbs -->

@foreach(range(1, 1) as $_)
<br>
@endforeach

<head>
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<style>
		.icon-control {
			margin-top: 5px;
			float: right;
			font-size: 80%;
		}



		.btn-light {
			background-color: #fff;
			border-color: #e4e4e4;
		}

		.list-menu {
			list-style: none;
			margin: 0;
			padding-left: 0;
		}

		.list-menu a {
			color: #343a40;
		}

		.card-product-grid .info-wrap {
			overflow: hidden;
			padding: 18px 20px;
		}

		[class*='card-product'] a.title {
			color: #212529;
			display: block;
		}

		.card-product-grid:hover .btn-overlay {
			opacity: 1;
		}

		.card-product-grid .btn-overlay {
			-webkit-transition: .5s;
			transition: .5s;
			opacity: 0;
			left: 0;
			bottom: 0;
			color: #fff;
			width: 100%;
			padding: 5px 0;
			text-align: center;
			position: absolute;
			background: rgba(0, 0, 0, 0.5);
		}

		.img-wrap {
			overflow: hidden;
			position: relative;
		}
	</style>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">
</head>

<div class="container">
	<div class="row">
		<aside class="col-md-3">

			<div class="card">
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Search Course</h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_1">
						<div class="card-body">
							<form class="pb-3">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search">
									<div class="input-group-append">
										<button class="btn btn-light" type="button"><i class="bx bx-search" style="font-size: 25px;"></i></button>
									</div>
								</div>
							</form>

						</div> <!-- card-body.// -->
					</div>
				</article> <!-- filter-group  .// -->
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Kategori </h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_2">
						<div class="card-body">
							<select id="kategori" class="mr-2 form-control">
							<option>-- Pilih Kategori --</option>
								@foreach($kategori_materi as $km)        
									<option>{{ $km }}</option>
								@endforeach
							</select>
						</div> <!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->

				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Level </h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_2">
						<div class="card-body">
							<select id="kategori" class="mr-2 form-control">
							<option>-- Pilih Level --</option>
								@foreach($level_materi as $lm)        
									<option>{{ $lm }}</option>
								@endforeach
							</select>
						</div> <!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->

				<article class="filter-group">
					<header class="card-header">
						<i class="icon-control fa fa-chevron-down"></i>
						<h6 class="title"><i class="bx bx-filter-alt text-primary" style="font-size: 25px;"></i> </h6>
					</header>
					<div class="filter-content collapse in" id="collapse_5">
						<div class="card-body">
							<label class="custom-control custom-radio">
								<input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
								<div class="custom-control-label">Any condition</div>
							</label>

							<label class="custom-control custom-radio">
								<input type="radio" name="myfilter_radio" class="custom-control-input">
								<div class="custom-control-label">Brand new </div>
							</label>

							<label class="custom-control custom-radio">
								<input type="radio" name="myfilter_radio" class="custom-control-input">
								<div class="custom-control-label">Used items</div>
							</label>

							<label class="custom-control custom-radio">
								<input type="radio" name="myfilter_radio" class="custom-control-input">
								<div class="custom-control-label">Very old</div>
							</label>
						</div><!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->
			</div> <!-- card.// -->

		</aside>
		<main class="col-md-9">

			<header class="border-bottom mb-4 pb-3">
				<div class="form-inline">
					<span class="mr-md-auto">Saat ini tersedia <b> {{ $materi }} </b> Materi </span>
				</div>
			</header><!-- sect-heading -->

			<!-- ======= Courses Section ======= -->
			<section id="courses" class="courses">
				<div class="container" data-aos="fade-up">

					<div class="row" data-aos="zoom-in" data-aos-delay="100">

					@foreach($ar_materi->take(3) as $m)
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
                    			<h4>{{{ $m->level }}}</h4>
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
			</section><!-- End Courses Section -->

			<nav class="mt-4" aria-label="Page navigation sample">
				<ul class="pagination">
					<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</nav>

		</main>
	</div>
</div>



@endsection
@extends('frontend.index')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
  <h2>Checkout Materi</h2>
  </div>
</div><!-- End Breadcrumbs -->

@foreach(range(1, 1) as $_)
    <br>
@endforeach
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Form Profil Pengguna -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Anda akan melakukan pembelian materi</h5>
    </div>
    <div class="card-body">
        <form>
        {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="judul">Judul Materi :</label>
                <input type="text" class="form-control" id="judul" name="judul" readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="level">Level :</label>
                <input type="text" class="form-control" id="level" name="level" readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="harga">Harga :</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly>
            </div>
            <br>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>
</div>

</div>

@endsection
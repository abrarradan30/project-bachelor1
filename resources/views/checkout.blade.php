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
    @foreach($materi as $m)
    <form action="{{ route('checkout-process') }}" method="POST">
    {{ csrf_field() }}
            <!-- Input Nama -->
            <div class="form-group">
                <label for="judul">Judul Materi :</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $m->judul }} " readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="level">Level :</label>
                <input type="text" class="form-control" id="level" name="level" value="{{ $m->level }}" readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="harga">Harga :</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  @php
                    $formattedPrice = (strpos(Auth::user()->email, '@mhs.stiki.ac.id') !== false || strpos(Auth::user()->email, '@stiki.ac.id') !== false) ? '1' : number_format($m->harga, 0, ',', '.');
                  @endphp
                  <input type="text" class="form-control" id="harga" name="harga" value="{{ $formattedPrice }}" readonly>
                </div>
            </div>
            <br>
            <div class="form-group">
              <label for="voucher">Voucher (*jika ada) :</label>
                @if(strpos(auth()->user()->email, '@mhs.stiki.ac.id') !== false || strpos(auth()->user()->email, '@stiki.ac.id') !== false)
                  <input type="text" class="form-control" id="voucher" name="voucher" readonly>
                @else
                  <input type="text" class="form-control" id="voucher" name="voucher">
                @endif  
            </div>
            <br>
            <input type="hidden" name="materi_id" value="{{ $m->id }}">
            <input type="hidden" name="price" value="{{ (strpos(Auth::user()->email, '@mhs.stiki.ac.id') !== false || strpos(Auth::user()->email, '@stiki.ac.id') !== false) ? '1' : $m->harga }}">
            <button type="submit" class="btn btn-primary">Beli Sekarang</button>
    </form>
    @endforeach
    </div>
</div>

</div>

<script>
function applyVoucher(materiId, originalPrice) {
    var voucher = document.getElementById('voucher-' + materiId).value;
    var priceInput = document.getElementById('price-' + materiId);
    var hargaInput = document.getElementById('harga-' + materiId);

    if (voucher === "LMSHEMAT") {
        var discountedPrice = originalPrice * 0.5;
        priceInput.value = discountedPrice;
        hargaInput.value = discountedPrice;
    } else {
        priceInput.value = originalPrice;
        hargaInput.value = originalPrice;
    }
}
</script>

@endsection
@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
    </div>
    <div class="card-body">
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembelian materi <strong>{{ $product_id['judul'] }}</strong> dengan harga
                <strong>Rp{{ number_format($product_id['price'], 0, ',', '.') }}</strong>
                    <button type="button" class="btn btn-primary mt-3" id="pay-button">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
    };
</script>

@endsection
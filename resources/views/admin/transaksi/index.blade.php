@extends('admin.layout.appadmin')

@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Transaksi</h1>
<p class="mb-4">Navigasi pembayaran materi.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul Materi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul Materi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp
                    @foreach ($transactions as $ts)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $ts->name }}</td>
                        <td>{{ $ts->judul }}</td>
                        <td>{{ number_format($ts->price, 0, ',', '.') }}</td>
                        <td>
                        @if($ts->status == 'pending')
                            <span class="btn btn-warning btn-sm" style="pointer-events: none;">{{ $ts->status }}</span>
                        @elseif($ts->status == 'success')
                            <span class="btn btn-success btn-sm" style="pointer-events: none;">{{ $ts->status }}</span>
                        @else
                            <span class="btn btn-danger btn-sm" style="pointer-events: none;">{{ $ts->status }}</span>
                        @endif
                        <td>{{ $ts->created_at }}</td>
                        <!-- <td>
                            @if($ts->status == 'pending')
                            <form action="{{ route('checkout-process') }}" method="POST">
                                <input type="hidden" name="id" value="{{ $ts->id }}">
                                <input type="hidden" name="product_id" value="{{ $ts->product_id }}">
                                <input type="hidden" name="price" value="{{ $ts->price }}">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </form>
                            @endif
                        </td> -->
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" id="pay-button">Bayar</button>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
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
        snap.pay('{{ $ts->snap_token }}', {
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
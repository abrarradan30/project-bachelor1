@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Kuis</h1>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kerjakan dengan teliti dan sungguh-sungguh!</h6>
    </div>
    <div class="card-body">
    <form>
        <div class="form-group">
            @php 
                $no = 1;
            @endphp
            <h5> No. Pertanyaan ?</h5>
              <div class="options">
                <label><input type="radio" name="q" value="a"> a. a </label><br>
                <label><input type="radio" name="q" value="b"> b. b </label><br>
                <label><input type="radio" name="q" value="c"> c. c </label><br>
                <label><input type="radio" name="q" value="d"> d. d </label><br>
              </div> 
            
            @php 
                $no++;
            @endphp
        </div>

        <div class="form-group">
            <a href="{{ url('#') }}" class="btn btn-info btn-sm">
                Selesai <i class="fa fa-flag-checkered"></i>
            </a>
        </div>
    </form>
    </div>
    
</div>

<br>

</div>
<!-- /.container-fluid -->

@endsection
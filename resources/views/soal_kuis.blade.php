@extends('admin.layout.appadmin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Judul </h1>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kuis</h6>
    </div>
    <div class="card-body" style="display: none;">
        <div class="form-group">
            <h3>Soal</h3>
              <div class="options">
                <label><input type="radio" name="q" value="a">a) a </label><br>
                <label><input type="radio" name="q" value="b">b) b </label><br>
                <label><input type="radio" name="q" value="c">c) c </label><br>
                <label><input type="radio" name="q" value="d">d) d </label><br>
              </div>   
        </div>

        <div class="form-group">
            
        </div>
    </div>
    <div class="card-header py-2">
        <i class="fa fa-chevron-circle-down fa-2x chevron-down" style="cursor: pointer;"></i>
        <i class="fa fa-chevron-circle-up fa-2x chevron-up" style="cursor: pointer; display: none;"></i>
    </div>
</div>

<br>

</div>
<!-- /.container-fluid -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all card elements
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const chevronDown = card.querySelector('.chevron-down');
            const chevronUp = card.querySelector('.chevron-up');
            const cardBody = card.querySelector('.card-body');

            // Event listener for chevron down icon
            chevronDown.addEventListener('click', function() {
                cardBody.style.display = 'block';
                chevronDown.style.display = 'none';
                chevronUp.style.display = 'inline';
            });

            // Event listener for chevron up icon
            chevronUp.addEventListener('click', function() {
                cardBody.style.display = 'none';
                chevronUp.style.display = 'none';
                chevronDown.style.display = 'inline';
            });
        });
    });
</script>

@endsection
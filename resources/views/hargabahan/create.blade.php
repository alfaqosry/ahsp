@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Tambah harga {{$bahan->bahan}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Harga {{$bahan->bahan}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('hargabahan.index', $tugas)}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah harga {{$bahan->bahan}}</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" action="{{ route('hargabahan.store', ['bahan_id' => $bahan->id, 'tugas_id' => $tugas]) }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}

                        <div class="col-md-12 position-relative">

                            <div class="row">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="input-group has-validation">
                                <input type="number" class="form-control @error('harga') is-invalid @enderror "
                                    name="harga" id="harga" aria-describedby="hargaPrepend" value="{{ old('harga') }}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('harga')
                                <div id="hargaFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            </div>
                        <div class="form-check">

                        </div>







                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form><!-- End Custom Styled Validation with Tooltips -->

                </div>
            </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->

{{-- 
<?php 
$prov_json = json_encode($provider);

 ?>
 <script>
$(document).ready(function(){
  $('#provider').change(function() {


    $(".moduloption").remove();

    var provider_kode = $(this).val();
    var prov = <?= $prov_json ?>;
    

    console.log(prov);

    for (i=0; i<prov.length; i++) {
       if (prov[i]['kode'] == provider_kode) {
        
        var modul = prov[i]['modul'];
       }
    
} 

for (i=0; i<modul.length; i++) {

  $('#modul').append("<option class='moduloption' value='"+ modul[i]['kode'] +"'>"+modul[i]['nama']+"</option>");
       
} 


  });
})
  </script> --}}

@endsection
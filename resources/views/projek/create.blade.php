@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Tambah Projek</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Tambah Projek</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('bahan')}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Projek</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" action="{{ route('projek.store') }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}


                        <div class="col-md-12 position-relative">

                            <div class="row">

                                <label for="projek" class="form-label">Projek</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control @error('projek') is-invalid @enderror" id="projek"
                                        aria-describedby="projekPrepend" name="projek">

                                        @error('projek')
                                        <div id="projekFeedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror


                                </div>
                            </div>

                            <div class="row">
                                <label for="tahun" class="form-label">Tahun</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control  @error('tahun') is-invalid @enderror" id="tahun"
                                        aria-describedby="tahunPrepend" name= "tahun">

                                        @error('tahun')
                                        <div id="tahunFeedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="surveyor1" class="form-label">Surveyor 1</label>
                                    <div class="input-group has-validation">

                                        <select class="form-select  @error('surveyor1') is-invalid @enderror"
                                          
                                            id="validationServer04" aria-describedby="surveyor1Prepend"
                                            name="surveyor1">
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($user as $u )
                                            <option value="{{$u['id']}}"> {{$u['nama']}}</option>
                                            @endforeach
                                           

                                        </select>

                                        @error('surveyor1')
                                        <div id="surveyor1Feedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="surveyor2" class="form-label">Surveyor 2</label>
                                    <div class="input-group has-validation">

                                        <select class="form-select  @error('surveyor2') is-invalid @enderror"
                                          
                                            id="validationServer04" aria-describedby="surveyor2Prepend"
                                            name="surveyor2">
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($user as $u )
                                            <option value="{{$u['id']}}"> {{$u['nama']}}</option>
                                            @endforeach
                                           

                                        </select>

                                        @error('surveyor2')
                                        <div id="surveyor2Feedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="surveyor3" class="form-label">Surveyor 1</label>
                                    <div class="input-group has-validation">

                                        <select class="form-select  @error('surveyor3') is-invalid @enderror"
                                          
                                            id="validationServer04" aria-describedby="surveyor3Prepend"
                                            name="surveyor3">
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($user as $u )
                                            <option value="{{$u['id']}}"> {{$u['nama']}}</option>
                                            @endforeach
                                           

                                        </select>

                                        @error('surveyor3')
                                        <div id="surveyor3Feedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <label for="permen_id" class="form-label">Permen</label>
                                    <div class="input-group has-validation">

                                        <select class="form-select  @error('permen_id') is-invalid @enderror"
                        
                                            id="permen_id" aria-describedby="permen_idPrepend" name="permen_id">
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($permen as $p )
                                            <option value="{{$p['id']}}">{{$p['permen']}}</option>
                                            @endforeach
                                            


                                        </select>

                                        @error('permen_id')
                                        <div id="permen_idFeedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                            </div>




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
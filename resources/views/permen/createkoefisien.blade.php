@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Tambah Koefisien {{ $pekerjaan->pekerjaan }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Tambah Koefisien</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('pekerjaan.show', $pekerjaan->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Koefisien</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" action="{{ route('koefisien.store', $pekerjaan->id) }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}

                        <div class="col-md-12 position-relative">

                            <div class="row">

                                
                                    <label for="bahan_id" class="form-label">Bahan</label>
                                    <div class="input-group has-validation">
    
                                        <select class="form-select select2  @error('bahan_id') is-invalid @enderror"
                        
                                            id="bahan_id" aria-describedby="bahan_idPrepend" name="bahan_id">
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($bahan as $item )
                                            <option value="{{$item['id']}}">{{$item['bahan']}}</option>
                                            @endforeach
                                            
    
    
                                        </select>
    
                                        @error('bahan_id')
                                        <div id="bahan_idFeedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                

                                
                                <label for="koefisien" class="form-label">Koefisien</label>
                                <div class="input-group has-validation">
                                <input type="text" class="form-control @error('koefisien') is-invalid @enderror "
                                    name="koefisien" id="koefisien" aria-describedby="koefisienPrepend" value="{{ old('koefisien') }}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('koefisien')
                                <div id="koefisienFeedback" class="invalid-tooltip">
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
@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Edit {{$user->nama}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Edit {{$user->nama}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('user')}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit {{$user->nama}}</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" action="{{ route('user.update', $user->id) }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}

                        <div class="col-md-12 position-relative">

                            <div class="row">

                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                <input type="text" class="form-control @error('username') is-invalid @enderror "
                                    name="username" id="username" aria-describedby="usernamePrepend" value="{{ $user->username }}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('username')
                                <div id="usernameFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>


                                <label for="nama" class="form-label">Nama</label>
                                <div class="input-group has-validation">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror "
                                    name="nama" id="nama" aria-describedby="namaPrepend" value="{{ $user->nama }}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('nama')
                                <div id="namaFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                                <label for="password" class="form-label">Password</label>
                                <div class="input-group has-validation">
                                <input type="text" class="form-control @error('password') is-invalid @enderror "
                                    name="password" id="password" aria-describedby="passwordPrepend" >
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('password')
                                <div id="passwordFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                               

                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                <input type="email" class="form-control @error('email') is-invalid @enderror "
                                    name="email" id="email" aria-describedby="emailPrepend" value="{{ $user->email }}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('email')
                                <div id="emailFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                                <label for="no_tlpn" class="form-label">No Telepon</label>
                                <div class="input-group has-validation">
                                <input type="no_tlpn" class="form-control @error('no_tlpn') is-invalid @enderror "
                                    name="no_tlpn" id="no_tlpn" aria-describedby="no_tlpnPrepend" value="{{ $user->no_tlpn }}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('no_tlpn')
                                <div id="no_tlpnFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                                
                                    <label for="role" class="form-label">Role</label>
                                    <div class="input-group has-validation">
    
                                        <select class="form-select  @error('role') is-invalid @enderror"
                        
                                            id="role" aria-describedby="rolePrepend" name="role">
                                            <option value="{{$user->role}}">{{$user->role}}</option>
                                           
                                            <option value="admin">Admin</option>
                                            <option value="surveyor">Surveyor</option>
                                            <option value="kabid">Kabid</option>
                                            <option value="kontraktor">Kontraktor</option>
                                           
                                        </select>
    
                                        @error('role')
                                        <div id="roleFeedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                


                         


                        <div class="form-check">

                        </div>







                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Tambah</button>
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
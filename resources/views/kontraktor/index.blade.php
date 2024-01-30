@extends('layouts.app')
@section('index_show', 'show')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Kontraktor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Kontraktor</li>
          <li class="breadcrumb-item active">Detail Kontraktor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
      

        <div class="col-xl-12">
          @if ($kontraktor->status == "permintaan")
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
              Permintaan pendaftaran kontraktor sedang di proses
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          @elseif ($kontraktor->status == "disetujui")
          <div class="alert alert-success alert-dismissible fade show" role="alert">
           Permintaan pendaftaran anda sebagai kontraktor di terima
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @else
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Permintaan pendaftaran anda sebagai kontraktor di tolak!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>

          @endif

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

               

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 

                  <h5 class="card-title">Kontraktor Detail</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Direktur</div>
                    <div class="col-lg-9 col-md-8">{{ $kontraktor->nama_direktur }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama CV</div>
                    <div class="col-lg-9 col-md-8">{{ $kontraktor->nama_cv }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">KTP</div>
                    <div class="col-lg-9 col-md-8">{{ $kontraktor->nik }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NPWP</div>
                    <div class="col-lg-9 col-md-8">{{ $kontraktor->npwp }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Akta Pendirian Perusahaan</div>
                    <div class="col-lg-9 col-md-8">{{ $kontraktor->no_akta_perusahaan }}</div>
                  </div>

                </div>

                              
                              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection

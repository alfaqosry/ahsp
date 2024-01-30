@extends('layouts.app')
@section('index_show', 'show')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Kontraktor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Daftar Kontraktor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
      

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

               

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Daftar Kontraktor</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                                <div class="tab-pane fade profile-edit pt-3 show active" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{route('kontraktor.store')}}" >
                    {{csrf_field()}}
                  

                    <div class="row mb-3">
                      <label for="nama_direktur" class="col-md-4 col-lg-3 col-form-label">Nama Direktur</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama_direktur" type="text" class="form-control" id="nama_direktur" value="{{ old('nama_direktur') }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama_cv" class="col-md-4 col-lg-3 col-form-label">Nama CV</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nama_cv" type="text" class="form-control" id="nama_cv" value="{{ old('nama_cv') }}">
                        </div>
                      </div>

                   

                    <div class="row mb-3">
                      <label for="nik" class="col-md-4 col-lg-3 col-form-label">KTP</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nik" type="text" class="form-control" id="ktp" value="{{ old('nik') }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="npwp" class="col-md-4 col-lg-3 col-form-label">NPWP</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="npwp" type="text" class="form-control" id="npwp" value="{{ old('npwp') }}">
                        </div>
                      </div>

                    <div class="row mb-3">
                      <label for="no_akta_perusahaan" class="col-md-4 col-lg-3 col-form-label">No Akta Perusahaan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_akta_perusahaan" type="text" class="form-control" id="no_akta_perusahaan" value="{{ old('no_akta_perusahaan') }}">
                      </div>
                    </div>

                   <div class="text-center">
                      <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                
                              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection

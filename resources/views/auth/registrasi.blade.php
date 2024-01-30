
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - System Analisis Harga Satuan Pekerjaan </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{config('master.aplikasi.logo')}}" rel="icon">
  <link href="{{config('master.aplikasi.logo')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            

              <div class="card mb-3">

                <div class="card-body">
                  
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>
                
                  <form class="row g-3 needs-validation" action="{{route('registrasi.store')}}" method="post" novalidate>
                    {{csrf_field()}}

                      
                    <div class="col-12">
                      <label for="username" class="form-label">username</label>
                      <input type="text" name="username" class="form-control @error('username')
                        is-invalid
                      @enderror" id="username" >
                      @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control @error('name')
                        is-invalid
                      @enderror" id="name" >
                      @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control @error('email')
                      is-invalid
                    @enderror" id="email" >
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="col-12">
                      <label for="no_tlpn" class="form-label">No Telepon</label>
                      <input type="number" name="no_tlpn" class="form-control @error('no_tlpn')
                      is-invalid
                    @enderror" id="no_tlpn" >
                    @error('no_tlpn')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control @error('password')
                      is-invalid
                    @enderror" id="password" >
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>


                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{route('login')}}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>
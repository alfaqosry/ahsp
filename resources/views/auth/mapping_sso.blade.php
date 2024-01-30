
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Connect dengan @section('')
      
  @show - Broadcast DISKOMINFOTIK</title>
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
  <style>
    .help-block {
        color: red;
    }
    .hidden {
        display: none;
    }
</style>
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
                    <h5 class="card-title text-center pb-0 fs-4">CONNECT SSO RIAU</h5>
                    <p class="text-center small">Hubungkan akun SSO anda dengan akun lokal aplikasi</p>
                  </div>
                
                  <form class="row g-3 needs-validation" action="{{route('registrasi.store')}}" method="post" novalidate>
                    {{csrf_field()}}

                    <div class="col-12">
                        <label for="email" class="form-label">Email SSO</label>
                        <input type="email" name="email" id="sso_email" class="form-control @error('email')
                        is-invalid
                      @enderror" value="<?php echo (isset($ssoUserInfo->email))?$ssoUserInfo->email:''; ?>" disabled >
                      @error('email')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                      </div>


                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control @error('username')
                        is-invalid
                      @enderror" id="username" >
                      <div class="username-error help-block hidden"></div>
                      @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                  

                    {{-- <div class="col-12">
                      <label for="nip" class="form-label">NIP</label>
                      <input type="number" name="nip" class="form-control @error('nip')
                      is-invalid
                    @enderror" id="nip" >
                    @error('nip')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div> --}}

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control @error('password')
                      is-invalid
                    @enderror"  >
                    <div class="password-error help-block hidden"></div>
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>

                    <center><span class='pesan'></span></center>


                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100 btn-connect-sso" type="button">Hubungkan</button>
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
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
 
  <script>
    $(document).ready(function(){
    
        $("#username, #password").keyup(function(e){ 
            $(".help-block").addClass('hidden');
            $(".pesan").html('');
        });
    
        $(".btn-connect-sso").click(function(){
            $('.form-group').removeClass('has-error');
            var password = $("#password").val();
            var username = $("#username").val();
            var sso_email = $("#email").val();
            var _token = $("[name='_token']").val();
            var dataString = {'username': username, 'password': password, 'email': sso_email, '_token': _token};
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "{{ route('sso.attempt') }}",
                data: dataString,
                dataType: 'json',
                cache: false,
                beforeSend: function(){
                    $(".btn-connect-sso").prop("disabled", true);
                    $(".btn-connect-sso").html('Connecting...');
                },
                success: function(data){
                    console.log(data);
                    if(data.status == true){
                        $(".pesan").show();
                        $(".pesan").html('<div class="alert alert-success" role="alert"><i class="fa fa-check-circle"></i> Berhasil login, Harap tunggu...</div>');
                        console.log(data);
                        setTimeout(function() { 
                            location.href="{{ route('pengumuman') }}";
                        },500);
                    }else{
                        console.log(data.pesan);
                        console.log(data.pesan.msg);
                        if(data.pesan.hasOwnProperty('msg')) {
                            $(".pesan").html('<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> '+ data.pesan.msg +'</div>');
                        }else{
                            $(".pesan").show();
                            $.each(data.pesan, function(i, item) {
                                $('#'+i).focus();
                                $("."+i+'-error').removeClass('hidden');
                                $("."+i+'-error').html(item[0]);
                            });
                        }
                    }
                    $(".btn-connect-sso").html('Hubungkan');
                    $(".btn-connect-sso").prop("disabled", false);
                },error:function(x, e){
                    $(".pesan").show();
                    $(".btn-connect-sso").prop("disabled", false);
                    $(".pesan").html('<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> Terjadi kesalahan. Error '+ x.status +'</div>');
                    $(".fa-sign-in").show();
                    $(".btn-connect-sso").html('Hubungkan');
                }
            });
            return false;
        });
    });
    </script>
    

</body>

</html>
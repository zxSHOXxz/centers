<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>HTC Center</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{ asset('cms/login/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('cms/login/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('cms/login/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{ asset('cms/login/css/style.css') }}" />

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free-6.1.1/css/all.min.css') }}">



  <script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('cms/js/crud.js')}}"></script>




  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon" />

</head>
<style>
    .login100-form-btn{
        width: 100% !important;
    }
    .card-header{
        height: fit-content;
    }
</style>

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <img src="{{ asset('cms/login/hams-removebg-preview.png') }}" alt="hams" style="width: 80px; height: 80px; margin: 20px;">
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark mb-6 text-center"><b>شركة الهمص للتدريب</b></h4>

                    <form action="/index.html">
                      <div class="row">


                            <div class="container-login100-form-btn w-100 mt-3">
                                <div class="wrap-login100-form-btn w-100">
                                    <div class="login100-form-bgbtn"></div>
                                    <a class=" btn login100-form-btn" href="{{ url("cms/admin/login") }}" style="background-color: rgb(67, 67, 235); color: white;">

                                        <i class="fa-solid fa-user-gear m-2"></i>  تسجيل دخول ادمن
                                    </a>
                                </div>
                            </div>
                            <div class="container-login100-form-btn w-100 mt-3">
                                <div class="wrap-login100-form-btn w-100">
                                    <div class="login100-form-bgbtn"></div>
                                    <a class=" btn login100-form-btn" href="{{ url("cms/trainer/login") }}" style="background-color: rgb(67, 67, 235); color: white;">
                                        <i class="fa-solid fa-chalkboard-user m-2"></i> تسجيل دخول مدرب
                                    </a>
                                </div>
                            </div>

                            <div class="container-login100-form-btn w-100 mt-3">
                                <div class="wrap-login100-form-btn w-100">
                                    <div class="login100-form-bgbtn"></div>
                                    <a class=" btn login100-form-btn" href="{{ url("cms/employee/login") }}" style="background-color: rgb(67, 67, 235); color: white;">
                                        <i class="fas fa-user m-2"></i> تسجيل دخول موظف
                                    </a>
                                </div>
                            </div>
                            <div class="container-login100-form-btn w-100 mt-3">
                                <div class="wrap-login100-form-btn w-100">
                                    <div class="login100-form-bgbtn"></div>
                                    <a class=" btn login100-form-btn"href="{{ url("cms/student/login") }}" style="background-color: rgb(67, 67, 235); color: white;">
                                        <i class="fa-solid fa-user-graduate m-2"></i> تسجيل دخول طالب
                                    </a>
                                </div>
                            </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->



<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('cms/login/plugins/nprogress/nprogress.js') }}"></script>

<script>
  function login() {
    var guard = '{{request('guard')}}';
    axios.post('/cms/'+guard+'/login', {
      email: document.getElementById('email').value,
      password: document.getElementById('password').value,
      remember_me: document.getElementById('remember').checked,
      guard: guard
    })
        .then(function (response) {
        window.location.href = '/cms/admin'
    })
        .catch(function (error) {
            if (error.response.data.errors !== undefined) {
              showErrorMessages(error.response.data.errors);

            } else {
                showMessage(error.response.data);
            }
        });
  }
  </script>

</body>
</html>

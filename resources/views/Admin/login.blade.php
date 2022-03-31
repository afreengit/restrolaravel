<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Ordering Admin</title>
  <!-- plugins:css -->
 
  <link rel="stylesheet" href="{{asset('adminassets/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('adminassets/css/bootstrap-datepicker.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('adminassets/css/style.css')}}">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                 <img src="{{asset('adminassets/images/logo.png')}}" alt="logo"> 
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
               


               <form method="post" class="pt-3" action="{{ url('/adminlogin') }}"> 
                @csrf
                <!-- @if($errors->any())
                <h5>{{$errors->first()}}</h5>
                @endif -->
                {{Session::get('msg')}}
                
                  
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="admin_email" placeholder="email" name="email" value="{{old('email')}}">
                  @error('email')
                  <div>{{$msg}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="admin_password" placeholder="Password" name="password">
                  @error('password')
                  <div>{{$msg}}</div>
                  @enderror
                </div>
                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</a>  -->
                  <button type="submit" class="btn btn-primary mr-2" name="login_btn">LOGIN</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- plugins:js -->
  <script src="{{asset('adminassets/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('adminassets/js/Chart.min.js')}}"></script>
  <script src="{{asset('adminassets/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('adminassets/js/off-canvas.js')}}"></script>
  <script src="{{asset('adminassets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('adminassets/js/template.js')}}"></script>
  <script src="{{asset('adminassets/js/settings.js')}}"></script>
  <script src="{{asset('adminassets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('adminassets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>
</html>
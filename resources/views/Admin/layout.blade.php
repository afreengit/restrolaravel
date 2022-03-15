<!DOCTYPE html>
<html lang="en">
<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>restro</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('adminassets/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/css/dataTables.bootstrap4.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('adminassets/css/bootstrap-datepicker.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('adminassets/css/style.css')}}">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="{{asset('adminassets/images/logo.png')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="{{asset('adminassets/images/logo.png')}}" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <!-- <a href="/logout">Logout</a> -->
          <!-- <li class="nav-item nav-profile dropdown"> -->
          <!-- data-toggle="dropdown" id="profileDropdown"--><a href="{{ url('logout/')}}">Logout 
              <!-- <span class="nav-profile-name"></span> -->
            </a> 
            <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown"> -->
              <!-- <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="">
                <i class="mdi mdi-logout text-primary"></i> -->
                
              <!-- </a>
            </div>
          </li> -->
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/adminhome">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/category">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
      <li class="nav-item">
            <a class="nav-link" href="customer.php">
              <i class="mdi mdi-view-headline menu-icon "></i>
              <span class="menu-title">Customer</span>
            </a>
          </li>
      <li class="nav-item">
            <a class="nav-link" href="/deliveryboy">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Delivery Boy</span>
            </a>
          </li>
       <li class="nav-item">
            <a class="nav-link" href="/coupon">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Coupon Code</span>
            </a>
          </li>


      <li class="nav-item">
            <a class="nav-link" href="/location">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Locations</span>
            </a>
          </li>
      
      <li class="nav-item">
            <a class="nav-link" href="/dish-details">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Dish</span>
            </a>
          </li>
      
      <li class="nav-item">
            <a class="nav-link" href="ordermaster.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Order</span>
            </a>
          </li>
      
      <li class="nav-item">
            <a class="nav-link" href="contact_us.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Contact Us</span>
            </a>
          </li>
      
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

                  @yield("content")
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><a href="{{asset('https://www.urbanui.com/')}}" target="_blank"></a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('adminassets/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('adminassets/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('adminassets/js/dataTables.bootstrap4.js')}}"></script>
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
  <script src="{{asset('adminassets/js/data-table.js')}}"></script>
  <!-- End custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  @yield("script")
</body>
</html>
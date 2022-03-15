<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Restro Laravel Project</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="/homepage">
                                    <img alt="" src="assets/img/logo/restrologo7.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                <div class="header-login">
                                        <div class="header-icon-style">
                                            <i class="icon-user icons"></i>
                                        </div>
                                        <div class="login-text-content">
                                            @auth
                                            Welcome{{auth()->user()->u_name}}!
                                             <form action="/logout" method="get">
                                            @csrf
                                        <!-- <div class="login-text-content" href="/logout"> -->
                                           <button type="submit">logout</button>
                                        </form>
                                            @else
                                            <p><a href=/register>Register</a> 
                                                <br> or<a href=/login>Sign in</a></p>
                                            @endauth
                                        </div> 
                                </div>

                                <div class="header-wishlist">
                                   &nbsp;
                                </div>

                                @auth
                                <a href="/showcart" style="color:red">showcart</a>
                                <!-- shopping cart link begins -->
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="header-icon-style">
                                            <i class="icon-handbag icons"></i>
                                            <span class="count-style">02</span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold">$209.00</span>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Phantom Remote </a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Phantom Remote</a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion ion-close"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Shipping : <span>$20.00</span></h4>
                                            <h4>Total : <span class="shop-total">$260.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="/showcart">view cart</a>
                                            <a href="checkout.html">checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- shopping cart link ends -->
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/profile">My profile</a></li>
                                        <li><a href="about-us.html">about</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header ends -->

		<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="/homepage">Home</a></li>
                        <li class="active"><a href="/profile">My Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>

 <div class="login-register-area pt-95 pb-100">
            <div class="container">
                 <h5 style="color:orange"> {{Session::get('success')}}</h5>
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4>My Profile </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form method="post" action="{{ url('/updateprofile')}}">
                                                @csrf

                                                <label>Username:</label>
                                                 <input type="text" name="u_name" id="u_name" value="{{ Auth::user()->u_name }}">
                                                 @error('u_name')
                                                <p>{{ $message }}</p>
                                                @enderror
                                                 
                                                <label>Email:</label>
                                                <input type="email" name="u_email" id="u_email" value="{{ Auth::user()->u_email }}"> 
                                                @error('u_email')
                                                <p>{{ $message }}</p>
                                                @enderror

                                                <label>Phone:</label>
                                                <input type="number" name="u_phone" id="u_phone" value="{{Auth::user()->u_phone}}">
                                                @error('u_phone')
                                                <p>{{ $message }}</p>
                                                @enderror

                                                <label>Home address:</label>
                                                <input type="text" name="u_home_address" id="u_home_address" value="{{Auth::user()->u_home_address}}">
                                                @error('u_home_address')
                                                <p>{{ $message }}</p>
                                                @enderror

                                                <label>Office address:</label>
                                                <input type="text" name="u_office_address" id="u_office_address" value="{{Auth::user()->u_office_address}}">
                                                @error('u_office_address')
                                                <p>{{ $message }}</p>
                                                @enderror

                                                <div class="button-box">
                                                    <button type="submit"><span>Update Profile</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<div class="footer-area black-bg-2 pt-70">
            <div class="footer-bottom-area border-top-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-7">
                            <div class="copyright">
                                <p>Copyright © <a href="#">Billy.</a> . All Right Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-5">
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                    <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- all js here -->
        <!-- <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="{{asset('assets/js/popper.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>

</html>
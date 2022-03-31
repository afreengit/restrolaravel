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
        <!-- jquery cdn link -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--  sweetalert links:-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
        <!-- bootstrap to get glyphicon icons -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="/">
                                    <img alt="logo" src="{{asset('assets/img/logo/restrologo7.jpg')}}">
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
                                            <p><a href=/customerlogout style="color: red">Logout</a></p>
                                            @else
                                            <p><a href=/register>Register</a> 
                                            <br> or
                                            <a href=/login style="color: red" >Sign in</a></p>
                                            @endauth
                                        </div> 
                                </div>

                                @auth
                                <a href="/showcart">
                                <!-- shopping cart link begins -->
                                <div class="header-cart">
                                    <!-- <a href="/showcart"> -->
                                        <div class="header-icon-style">
                                            <i class="icon-handbag icons"></i>
                                            <!-- cart count -->
                                            <span class="count-style">0</span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold">$209.00</span>
                                        </div>
                                    <!-- </a> -->
                                </div>
                                <!-- shopping cart link ends -->
                                </a>
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
                                        @php
                                        $category = App\Models\Categorys::where('ct_status','1')->get();
                                        @endphp
                                        @foreach($category as $values)
                                       <!--  <li><a href="{{ url('products'.'/'.$values->ct_name,[$values->ct_id]) }}">{{ $values->ct_name }}</a></li> -->
                                        <li>
                                        <a href="{{ url('products/'.$values->ct_name.'/'.$values->ct_id)}}">{{$values->ct_name}}</a>
                                        </li>
                                        @endforeach
                                        @auth
                                        <li>
                                            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">My profile</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="{{ url('/displayprofile') }}" style="color:black;">Update</a>
                                            <a class="dropdown-item" href="{{ url('/changepassword') }}" style="color:black;">Change password</a>
                                            </div>
                                        </li>
                                        @endauth
                                    </ul>
                                </nav>

                            </div>
                            <div class="main-menu-right">
                                 <input type="checkbox" id="vegcheckbox" > <p style="color:white">Veg Only</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header ends -->


@yield('content')
@yield('script')


<script>
$(document).ready(function(){

    $('#vegcheckbox').click(function(){
        $("#emptynot").remove();
        if($(this).prop("checked") == true)
        { 
            $('.class-non-veg').hide();
            if($(".class-veg").length<=0)
            {
                $("<div class='alert alert-danger col-xl-12' id='emptynot'>").html("No vegitarian dishes to display").appendTo("#productbegins");
            }
        }
        else if($(this).prop("checked") == false)
        {
            $('.class-non-veg').show();
        }
    }); //end of vegcheckbox

});//end of ready fn
</script>
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
        
        <!-- custom js here -->
        <!-- <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
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
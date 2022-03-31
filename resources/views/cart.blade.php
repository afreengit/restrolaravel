<?php
// dd(Auth::id());
?>
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
                                    <img alt="restrologo" src="assets/img/logo/restrologo7.jpg">
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
                                             <form action="/customerlogout" method="get">
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
                                        <li>
                                            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">My profile</a>

                                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="{{ url('/displayprofile') }}" style="color:black;">Update</a>
                                            <a class="dropdown-item" href="{{ url('/changepassword') }}" style="color:black;">Change password</a>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header ends -->

<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                @if($cartitems->count() == 0)
                <img alt="cart is empty" src="{{asset('assets/img/cartempty.png')}}" width="400px" height="200px" style="display: block; margin-left: auto;margin-right: auto; width: 50%;">
                @else
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Portion</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total = 0;
                                        @endphp

                                    	@foreach($cartitems as $values)

                                        @php 
                                        $subtotal=$values->products->dd_price*$values->qty;
                                        $total += $subtotal; 
                                        @endphp
                                        
                                        <tr>
                                            <td class="product-thumbnail">
                                                <!-- <img src="{{ asset('assets/uploads/dishimage/'.$values->dmname->dm_image) }}" alt="dishimagealt"> doesnt work-->
                                                <img src="{{ url('uploads/dishimage/'.$values->dmname->dm_image) }}" width="80px" height="100px" alt="dish-image">
                                            </td>
                                            <td class="product-name">{{ $values->dmname->dm_name }}</td>
                                            <td class="product-portion">{{ $values->products->dd_portion }}</td>
                                            <td class="product-price-cart">
                                                <span class="amount">{{ $values->products->dd_price }}</span>
                                            </td>


                                            <td class="product-quantity product-content">
                                                <!-- <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box productqty" type="number" max='10' name="qtybutton" id="qtybutton" value="{{$values->qty}}">
                                                </div> -->
                                                <button class="changeQuantity decrement-btn">-</button>
                                                   <input type="text" name="quantity" class=" productqty input-number text-center" max="10" value="{{$values->qty}}">
                                                   <button class="changeQuantity increment-btn">+</button>
                                                   <input type="hidden" name="dd_id" class="dd_id" value="{{ $values->dd_id }}">
                                            </td>
                                            <td class="product-subtotal">{{ $subtotal }}</td>
                                            <td class="product-remove">
                                                <!-- <a href="#"><i class="fa fa-pencil"></i></a> -->
                                                <!-- <a href="#"><i class="fa fa-times"></i></a> -->
                                                <button class="btn btn-danger delete-cart-item"><i class="fa fa-times"></i></button>
                                                <input type="hidden" name="" class="cart_id" value="{{ $values->dc_id }}">
                                           </td>
                                        </tr>
                                        
                                        @endforeach 
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>DELIVERY CHARGE:</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>TOTAL BILL:</td>
                                            <td>Rs {{ $total }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="/">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button>Clear Shopping Cart</button>
                                            <!-- <b><a href="#">CHECKOUT</a></b> -->
                                            <button class="btn btn-outline-success"><a href="{{ url('/checkout') }}">CHECKOUT</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('.delete-cart-item').click(function(e){
        e.preventDefault();
        var cart_id=$(this).closest('.product-remove').find('.cart_id').val();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
            type:"POST",
            url:"{{ url('/deletefromcart') }}",
            data:{
                'cart_id':cart_id,
            },
            success:function (response) {
                window.location.reload();
                swal("",response.status,"success");
            }
        }); //endofajax
    }); //end of deletecartitem

    // inc and dec qty starts
    $('.increment-btn').click(function (e)
    {
        e.preventDefault();
        // var inc_value=$('.productqty').val();
        var inc_value=$(this).closest('.product-content').find('.productqty').val();
        // console.log(inc_value);
        var value=parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if (value < 10)
        {
            value++;
            // $('.productqty').val(value);
            $(this).closest('.product-content').find('.productqty').val(value);

        }
        // console.log(value);
    });

    $('.decrement-btn').click(function (e)
    {
        e.preventDefault();
        // var dec_value=$('.productqty').val();
        var dec_value=$(this).closest('.product-content').find('.productqty').val();
        var value=parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;
        if (value > 1)
        {
            value--;
            //$('.productqty').val(value);
            $(this).closest('.product-content').find('.productqty').val(value);
        }
    });

    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });

    //ensuring btw 0 and 1
    $('.input-number').change(function() {
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    name = $(this).attr('name');
    if(valueCurrent >= maxValue) {
        swal('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= minValue) {
        swal('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    });

    //ensuring its a number
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });// inc and dec qty ends

    $(".changeQuantity").click(function(e){
    e.preventDefault();
    var prod_id = $(this).closest('.product-content').find('.dd_id').val();
    var qty = $(this).closest('.product-content').find('.productqty').val();
    data = {
        "prod_id" : prod_id,
        "prod_qty" : qty,
        }
    $.ajaxSetup({   
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    $.ajax({
        method: "POST",
        url: "{{ url('/updatecart') }}",
        data: data,
        success: function (response) 
            {
            // alert(response.status);
            window.location.reload();
            }
        });
    });//end of changeqty fn

}); //end of ready fn
</script>
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
@extends('layout')
@section('content')

        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                        <!-- <div class="banner-area pb-30">
                            <a href="#"><img
                             alt="this is banner" src="/assets/img/banner/banner-49.jpg"></a>
                        </div> -->
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row productbegins" id="productbegins">
                                    @if ($dish->count() == 0)
                                    No dishes to display.
                                    @endif
                                                                        
                                    @foreach($dish as $values)
                                    <div class="product-width col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mb-30 {{$values->dm_type==1?'class-non-veg':'class-veg'}}">
                                        <div class="product-wrapper">

                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="/assets/img/product/product-1.jpg" alt="dish image">
                                                    <!-- <img src="{{ url('uploads/dishimage/'.$values->dm_image) }}" alt="/assets/img/product/product-1.jpg"> -->
                                                </a>
                                            </div>

                                            <div class="product-content">

                                                <!-- name and type begins -->
                                                <div class="main-menu-right">
                                                    @if($values->dm_type==1)
                                                    <img src='/img/icon-img/non-veg.png'/>
                                                    @else
                                                    <img src='/img/icon-img/veg.png'/>
                                                    @endif
                                                </div>
                                                <h4><strong>
                                                    <a>{{$values->dm_name}} </a>
                                                </strong></h4> 
                                                <!-- name and type ends -->

                                                <!-- displaying portion details -->
                                                <div class="product-price-wrapper">
                                                    @foreach($values->dishdetail as $values)
                                                    <input type="radio" name="dishportion" value="{{ $values->dd_id }}">
                                                    <span>{{ $values->dd_portion }}-{{ $values->dd_price }}</span>
                                                    @endforeach
                                                </div>
                                                <!-- displaying portion details ends--> 

                                                <!-- qty and addtocart begins -->
                                                <div>
                                                    <!-- <input type="number" value="1" min="1" max="10" class="productqty"> -->

                                                    <!-- <div class="input-group text-center mb-3" style="width:130px;">
                                                        <button class="input-group-text decrement-btn"><span class="glyphicon glyphicon-minus"></span></button>
                                                        <input type="text" name="quantity" class="form-control text-center productqty" value="1">
                                                        <button class="input-group-text"><span class="glyphicon glyphicon-plus increment-btn"></span></button>
                                                    </div> -->
                                                

                                                <div class="input-group text-center mb-3" style="width:138px;">
                                                  <button class="input-group-text changeQuantity decrement-btn">-</button>
                                                   <input type="text" name="quantity" class="form-control productqty input-number text-center" value="1"  max="10">
                                                   <button class="input-group-text changeQuantity increment-btn">+</button>
                                                </div>
                                                
                                                   
                                                    <input type="hidden" value="{{ $values->dm_name }}" class="productname">
                                                    <input type="hidden" value="{{ $values->dm_id }}" class="productid">
                                                    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">Add to cart</i></button>

                                                </div><!-- qty and addtocart ends -->

                                            </div><!-- PRODUCT CONTENT DIV END -->
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                
                                </div>
                            </div>  
                        </div>

                    </div>
@endsection

@section('script')
<script>
$(document).ready(function(){
// jQuery.noConflict();
// if (jQuery) {   
//     alert("jQuery is loaded !");
//   } 
// else {
//     alert("jQuery is not loaded!");
//   }
    // addtocart starts
    $('.add-to-cart').click(function(e){
        e.preventDefault();
        var product_id=$(this).closest('.product-content').find('.productid').val();
        var productdetail_id=$("input[name='dishportion']:checked").val();
        var product_qty=$(this).closest('.product-content').find('.productqty').val();
        // alert(productdetail_id);
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
            method: "POST",
            // url: "../addtocart",
            url:"{{ url('/addtocart') }}",
            data: {
                "dmid":product_id,
                "qty":product_qty,
                "ddid":productdetail_id,
            },
            success:function(response){
                // alert(response.status);
                swal(response.status);
                // console.log("success");
            }
        }); //end of ajax

    }); //end of addtocartjquery

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

});//end of ready fn
</script>
@endsection
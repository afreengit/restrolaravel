@extends('layout')
@section('content')
        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li class="active">{{$presentcategoryname}} </li>
                    </ul>
                </div>
                <div class="main-menu-right">
                    <input type="checkbox" id="vegcheckbox">Veg Only
                </div>
            </div>
        </div>

        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <!-- <div class="banner-area pb-30">
                            <a href="#"><img
                             alt="this is banner" src="/assets/img/banner/banner-49.jpg"></a>
                        </div> -->
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row productbegins" id="productbegins">
                                    
                                    @foreach($dish as $values)
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30 {{$values->dm_type==1?'class-non-veg':'class-veg'}}">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="/assets/img/product/product-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content"> <!-- PRODUCT CONTENTS START -->
                                                <div class="main-menu-right">
                                                    @if($values->dm_type==1)
                                                    <img src='/img/icon-img/non-veg.png'/>
                                                    @else
                                                    <img src='/img/icon-img/veg.png'/>
                                                    @endif
                                                </div>
                                                <h4>
                                                    <a>{{$values->dm_name}} </a>
                                                </h4> 

                                                <!-- displaying portion details -->
                                                <div class="product-price-wrapper">
                                                    @foreach($values->dishdetail as $values)
                                                    <input type="radio" name="dishportion" value="{{ $values->dd_id }}">
                                                    <span>{{ $values->dd_portion }}-{{ $values->dd_price }}</span>
                                                    <!-- <label class="form-check-label" for="flexCheckDefault">{{ $values->dd_portion }}-{{ $values->dd_price }}</label> -->
                                                    @endforeach
                                                </div>
                                                <!-- displaying portion details ends--> 

                                                <div>
                                                    <input type="hidden" value="{{ $values->dm_name }}" class="productname">
                                                    <input type="hidden" value="{{ $values->dm_id }}" class="productid">
                                                    <!-- <form action="{{url('/addtocart',$values->dm_id)}}" method="post">
                                                        @csrf -->
                                                    <input type="number" default='1' name="qty" id="qty" value="1" min="1" class="form-control productqty" style="width: 100px">
                                                    
                                                    <!-- <input class="btn btn-primary addToCartbtn" type="submit" value="Add To Cart"> -->
                                                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">Add to cart</i></a> -->
                                                    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">Add to cart</i></button>
                                                    <!-- </form> -->

                                                </div>
                                            </div> <!-- PRODUCT CONTENTS END -->
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
   
    var temp;
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
            url: "../addtocart",
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

});
 //end of ready fn
</script>
@endsection('endscript')
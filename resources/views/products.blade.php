@extends('layout')
@section('content')
        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="/homepage">Home</a></li>
                        <li class="active">{{$presentcategoryname}} </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <!-- <div class="banner-area pb-30">
                            <a href="#"><img alt="this is banner" src="/assets/img/banner/banner-49.jpg"></a>
                        </div> -->
                        
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                                    @foreach($dish as $values)
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="/assets/img/product/product-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4>
                                                    <a href="product-details.html">{{$values->dm_name}} </a>
                                                </h4> 
                                                <div class="product-price-wrapper">
                                                    <span>$100.00</span>
                                                </div>
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
                                            </div>
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
    $('.add-to-cart').click(function(e){
        e.preventDefault();
        var product_id=$(this).closest('.product-content').find('.productid').val();
        var product_qty=$(this).closest('.product-content').find('.productqty').val();
        // alert(product_qty);
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            method: "POST",
            url: "../addtocart",
            data: {
                "dmid":product_id,
                "qty":product_qty,
            },
            success:function(response){
                alert(response.status);
                // swal(response.status); not working
                // console.log("success");
            }
        });

    });
});
</script>
@endsection('endscript')
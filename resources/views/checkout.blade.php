@extends('layout')
@section('content')
<h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">billing information</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input type="text" placeholder="Optional">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Address</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Zip/Postal Code</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-select">
                                                            <label>Location</label>
                                                            @php
                                                            $loc = App\Models\Locations::where('lo_status','1')->get();
                                                            @endphp
                                                            <select>
                                                                @foreach($loc as $values)
                                                                <option value="$values->lo_id">{{$values->lo_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ship-wrapper">Payment mode:
                                                    <div class="single-ship">
                                                        <input type="radio" name="address" value="address" checked="">
                                                        <label>COD</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio" name="address" value="dadress">
                                                        <label>Card/Online payment</label>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back to cart</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button class="final-btn" type="submit">Order complete!!!</button>
                                                    </div>
                                                </div>
                                            </div>
<!-- fields in order master:
userid
delivery agent id (nullable at first)
total price
payment mode (cod or card)
phone 
address (already given in profile)
location (select from db)
payment status (pending)
order status (ordered-food prepared-on the way- delivered)
cancelled (yes or no) (no by default)

fields in order details:
dd_id (f.k)
qty
od_price -->


@endsection
@section('script')
<script>
$(document).ready(function(){
    $('.final-btn').click(function(e){
        e.preventDefault(); 
        var product_id=$(this).closest('.product-content').find('.productid').val();
        alert(productdetail_id);
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

});//end of ready fn
</script>
@endsection
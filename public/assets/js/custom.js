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
            $('.productqty').val(value);
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

}); //end of ready fn
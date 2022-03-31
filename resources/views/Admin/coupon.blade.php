@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Coupon Details</h1>
               <!-- <a href="/add_coupon" class="btn btn-primary">Add coupon</a>  -->
               <button type="button" class="btn btn-primary modalOpener"
               data-id="" data-cpncode="" data-cpnvalue="" data-cpncart="" data-cpnexpire="" data-cpnstatus="">Add Coupon
  
</button>
  @if (session()->has('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}
                  </div>
                    @endif

                    @if (session()->has('message'))
                  <div class="alert alert-danger">
                    {{ session()->get('message') }}
                  </div>
                    @endif
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Code</th>
                            <th>Value</th>
                            <th>mininmum Cart</th>
                            <th>Expiry</th>
                            <th>Status</th>
                            <th>Addedon</th>
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($coupons as $values)  
                        <tr>
                            <td>{{$values->cp_code}}</td>
                                  <td>{{$values->cp_value}}</td>
                                  <td>{{$values->cp_cartmin}}</td>
                                  <td>{{$values->cp_expiry}}</td>
                                  <td>@if($values->cp_status==1)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                </td>

                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>

                                  <!-- <td><a type="button" class="btn btn-primary" href="{{ url('editcpn/'.$values->cp_id)}}" >edit</a> -->
                                  
                              <!-- <a class="btn btn-primary" href="{{'deletecpn/'.$values->cp_id}}" >delete</a> -->
                            <td>
                                  
                              <a class="fa fa-pencil modalOpener" data-id="{{$values->cp_id}}" data-cpncode="{{$values->cp_code}}" data-cpnvalue="{{$values->cp_value}}" data-cpncart="{{$values->cp_cartmin}}" data-cpnexpire="{{$values->cp_expiry}}" data-cpnstatus="{{$values->cp_status}}"></a>
                              <!-- <a type="button" class="fa fa-trash" href="{{url('deletecpn/'.$values->cp_id)}}"></a> -->
                              <a type="button" class="fa fa-trash" data-toggle="modal" data-target="#coupondelete"></a>
                            </td>
                            
                            
                        </tr>
                        @endforeach
                        

                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
         

         <div class="modal fade" id="cpnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="cpnModalHead">Update Coupon Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form method="post" action="{{url('/editcoupon_action')}}" id="couponform">
            @csrf
          <!-- <div class="row"> -->
      <!-- <h1 class="card-title ml10"></h1> -->
            <!-- <div class="col-12 grid-margin stretch-card"> -->
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                       <input type="hidden" name="id" id="cpnId" value=""> 
                      <label for="coupon">Coupon Code</label>
                      <input type="text" class="form-control" placeholder="coupon code" name="cpncode" id="cpncode" value="">
                      <span class="text-danger" id="cpncode-error"></span>
                     
                    </div>
                    <div class="form-group">
                      <label for="cpvalue">Coupon Value</label>
                      <input type="text" class="form-control" placeholder="coupon value" name="cpnvalue" id="cpnvalue" value="">
                      <span class="text-danger" id="cpnvalue-error"></span>
                     
                    </div>
                    <div class="form-group">
                      <label for="minvalue">Min Cart Value</label>
                      <input type="text" class="form-control" placeholder="minimum value" name="cpncart" id="cpncart" value="">
                      <span class="text-danger" id="cpncart-error"></span>
                      
                    </div>
                    <div class="form-group">
                      <label for="expire">Expire Date</label>
                      <input type="date" class="form-control" id="cpnexpire" placeholder="Expiry Date" name="expire" value="">
                      <span class="text-danger" id="cpnexpire-error"></span>
                     
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="cpnstatus" name="cpnstatus" value="">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" id="cpnstatus-error"></span>
                      </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="coupon_btn" id="cpnModalfooter">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                  </div>
                </div>
              <!-- </div> -->
            <!-- </div> -->
                  </form>
                </div>
              </div>
            </div>
            
     </div>
 <!-- delete modal -->

<div class="modal fade" id="coupondelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Coupon Details</h3>
        
      </div>
      <div class="modal-body">
      Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{url('deletecpn/'.$values->cp_id)}}">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- end delete modal -->
          
        
        @endsection
		@section("script")
<script type="text/javascript">
$(document).ready(function(){
$(".modalOpener").click(function(btn){
  btn.preventDefault();
  myid=$(this).data("id");
  cpcode=$(this).data("cpncode");
  cpvalue=$(this).data("cpnvalue");
  cpcart=$(this).data("cpncart");
  cpexpire=$(this).data("cpnexpire");
  cpstatus=$(this).data("cpnstatus");
  $("#cpnModalHead").html(myid?"Update Coupon Details":"Add Coupon Details");
  $("#cpnModalfooter").html(myid?"save":"save");
  $("#cpnId").val(myid);
  $("#cpncode").val(cpcode);
  $("#cpnvalue").val(cpvalue);
  $("#cpncart").val(cpcart);
  $("#cpnexpire").val(cpexpire);
  $("#cpnstatus").val(cpstatus);
  

  // catName
  $("#cpnModal").modal("show");
  $("#cpncode-error,#cpnvalue-error,#cpncart-error,#cpnexpire-error,#cpnstatus-error").html("");
});
$('#couponform').on('submit',function(e){
     e.preventDefault();

    let cpncode = $('#cpncode').val();
    let cpnvalue = $('#cpnvalue').val();
    let cpncart = $('#cpncart').val();
    let cpnexpire = $('#cpnexpire ').val();
    let cpnstatus = $('#cpnstatus').val();
    
     $.ajax({
       url: "/editcoupon_action",
       type:"POST",
       data:{
         "_token": "{{ csrf_token() }}",
        cpncode:cpncode,
        cpnvalue:cpnvalue,
        cpncart:cpncart,
        cpnexpire:cpnexpire,
        cpnstatus:cpnstatus,
         id:$("#cpnId").val()
       },
       success:function(response){
         $('#successMsg').show();
         console.log(response);
         $("#cpnModal").modal("hide");
         window.location.reload();
       },
       error: function(response) {
         $('#cpncode-error').text(response.responseJSON.errors.cpncode);
         $('#cpnvalue-error').text(response.responseJSON.errors.cpnvalue);
         $('#cpncart-error').text(response.responseJSON.errors.cpncart);
         $('#cpnexpire-error').text(response.responseJSON.errors.cpnexpire);
         $('#cpnstatus-error').text(response.responseJSON.errors.cpnstatus);
       },
       });
     });


  
});


</script>       
@endsection 
@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Location Details</h1>
              <!-- <a href="/location" class="btn btn-primary">Add locations</a> -->
               <button type="button" class="btn btn-primary modalOpener" data-id="" data-locname="" data-locstatus="" data-locdelcharge="">
              Add Locations
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
                            
                            <th>location</th>
                            <th>status</th>
                            <th>Delivery Charge</th>
                            <th>Addedon</th>
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($locations as $values)  
                        <tr>
                            <td>{{$values->lo_name}}</td>
                                  <td>@if($values->lo_status==1)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                </td>


                                  <td>{{$values->lo_deliverycharge}}</td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>

                                   <td>
                                  
                              <a class="fa fa-pencil modalOpener" data-id="{{$values->lo_id}}" data-locname="{{$values->lo_name}}" data-locstatus="{{$values->lo_status}}" data-locdelcharge="{{$values->lo_deliverycharge}}"></a>
                              <a type="button" class="fa fa-trash" data-toggle="modal" data-target="#locationdelete"></a>
                            </td>

                             <!-- <td><a type="button" class="btn btn-primary" href="{{ url('editloc/'.$values->lo_id)}}" >edit</a> -->
                                  
                              <!-- <a class="btn btn-primary" href="{{'deleteloc/'.$values->lo_id}}" >delete</a> -->
                            
                            
                        </tr>
                        @endforeach
                        

                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>




          <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="catModalHead">Update Location Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form method="post" action="{{ url('/editlocation_action')}}" id="locationform">
               @csrf
          <!-- <div class="row"> -->
      <!-- <h1 class="card-title ml10"></h1> -->
            <!-- <div class="col-12 grid-margin stretch-card"> -->
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" name="id" id="locId" value=""> 
                      <label for="location">Location</label>
                      <input type="text" class="form-control" id="locname" placeholder="location" name="locname" value="">
                      </div>
                      <span class="text-danger" id="locname-error"></span>

                     <div class="form-group">
                      <label for="delcharge"> DeliveryCharge</label>
                      <input type="text" class="form-control" id="locdelcharge" placeholder="Delivery charge" name="locdelcharge" value="">
                      </div>
                      <span class="text-danger" id="locdelcharge-error"></span>
                    
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="locstatus" name="locstatus" value="">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" id="locstatus-error"></span>
                      </div>
                     
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn" id="catModalfooter">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
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

<div class="modal fade" id="locationdelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Location Details</h3>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{url('deleteloc/'.$values->lo_id)}}">Delete</a>
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
  locname=$(this).data("locname");
  locstatus=$(this).data("locstatus");
  locdelcharge=$(this).data("locdelcharge");
  $("#catModalHead").html(myid?"Update locations Details":"Add locations");
  $("#catModalfooter").html(myid?"save":"save");
  $("#locId").val(myid);
  $("#locname").val(locname);
  $("#locstatus").val(locstatus);
  $("#locdelcharge").val(locdelcharge);
  // catName
  $("#locationModal").modal("show");
  $("#locname-error,#locdelcharge-error,#locstatus-error").html("");
});
 $('#locationform').on('submit',function(e){
     e.preventDefault();

    let locname = $('#locname').val();
    let locdelcharge = $('#locdelcharge').val();
    let locstatus = $('#locstatus').val();
    
     $.ajax({
       url: "/editlocation_action",
       type:"POST",
       data:{
         "_token": "{{ csrf_token() }}",
         locname:locname,
         locdelcharge:locdelcharge,
         locstatus:locstatus,
         id:$("#locId").val()
       },
       success:function(response){
         $('#successMsg').show();
         console.log(response);
         $("#locationModal").modal("hide");
         window.location.reload();
       },
       error: function(response) {
         $('#locname-error').text(response.responseJSON.errors.locname);
         $('#locdelcharge-error').text(response.responseJSON.errors.locdelcharge);
         $('#locstatus-error').text(response.responseJSON.errors.locstatus);
       },
       });
     });  
  
}); 
 



</script>       
@endsection
		
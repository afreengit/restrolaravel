@extends("Admin.layout")
@section("content")

      <!-- partial -->
      <!-- <div class="main-panel"> -->
        <!-- <div class="content-wrapper"> -->
          <div class="card">
            <div class="card-body">
              <h1>DeliveryBoys Details</h1>
               <button type="button" class="btn btn-primary modalOpener" data-id="" data-delname="" data-mobile="" data-status="">Add
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
              <!--<a href="/deliveryboy" class="btn btn-primary">Add</a>-->
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                   
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Addedon</th>
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                       @foreach($deliveryboys as $values)
                        <tr>
                            <td>{{$values->dl_name}}</td>
                                  <td>{{$values->dl_mob}}</td>
                                  <!-- <td> -->
                                    <!-- <input data-id="{{$values->dl_id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $values->status ? 'checked' : '' }}> -->
                                   </td> 
                                  <td>@if($values->dl_status==1) 
                                     <span class="btn btn-success">active</span> 
                                   @else
                                   <span class="btn btn-danger">Inactive</span> 
                                   @endif 
                                </td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>
                                  <td><a class="fa fa-pencil modalOpener" data-id="{{$values->dl_id}}" data-delname="{{$values->dl_name}}" data-mobile="{{$values->dl_mob}}" data-status="{{$values->dl_status}}"></a>
                              <a type="button" class="fa fa-trash" data-toggle="modal" data-target="#deliverydelete"></a></td>
                            
                            <!-- <td><a type="button" class="btn btn-success" href="{{ url('editdel/'.$values->dl_id)}}" >edit</a> -->
                              <!-- <a class="btn btn-danger deletedeleverybtn" href="{{'deletedel/'.$values->dl_id}}" >delete</a> -->

                        </tr>
                         @endforeach

                      </tbody>
                    </table>
                  </div>
        </div>
              </div>
            </div>
          </div>

<!-- modal begins -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="delModalHead"></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          <form method="post" action="{{ url('/editdeliveryboy_action')}}" id="deliveryform">
             @csrf

          <!-- <div class="row"> -->
      <!-- <h1 class="card-title ml10"></h1> -->
            <!-- <div class="col-12 grid-margin stretch-card"> -->
              <div class="card">
                <div class="card-body">
                 <div class="form-group">
                      <input type="hidden" name="id" value="" id="delId"> 
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="delname" placeholder="Name" name="delname" value="">
                      <span class="text-danger" id="delname-error"></span>
                       
                    </div>
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" id="mobile" placeholder="mobile" name="mobile" value="">
                      <span class="text-danger" id="delmobile-error"></span>
                       
                    </div>
                    <div class="form-group">
                      <label for="status" id="status">Status</label>
                        <select class="form-control" id="status" name="status" value="">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" id="delstatus-error"></span>
                      </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="delivery_btn" id="delModalfooter">Save</button>

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

<div class="modal fade" id="deliverydelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Deliverboys Details</h3>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{url('deletedel/'.$values->dl_id)}}">Delete</a>
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
  myname=$(this).data("delname");
  mymob=$(this).data("mobile");
  mystatus=$(this).data("status");
  $("#delModalHead").html(myid?"Update delivery boy Details":"Add delivery boy details");
  $("#delModalfooter").html(myid?"save":"save");
  $("#delId").val(myid);
  $("#delname").val(myname);
  $("#mobile").val(mymob);
  $("#status").val(mystatus);
  // catName
  $("#delModal").modal("show");
  $("#delname-error,#delmobile-error,#delstatus-error").html("");
});

$('#deliveryform').on('submit',function(e){
     e.preventDefault();

    let delname = $('#delname').val();
    let mobile = $('#mobile').val();
    let status = $('#status').val();
    
     $.ajax({
       url: "/editdeliveryboy_action",
       type:"POST",
       data:{
         "_token": "{{ csrf_token() }}",
         delname:delname,
         mobile:mobile,
         status:status,
         id:$("#delId").val()
       },
       success:function(response){
         $('#successMsg').show();
         console.log(response);
         $("#delModal").modal("hide");
         window.location.reload();
       },
       error: function(response) {
         $('#delname-error').text(response.responseJSON.errors.delname);
         $('#delmobile-error').text(response.responseJSON.errors.mobile);
         $('#delstatus-error').text(response.responseJSON.errors.status);
       },
       });
     });



  
}); 


 $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('dl_id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'dl_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
 

</script>       
@endsection
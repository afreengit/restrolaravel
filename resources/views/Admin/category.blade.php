@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Category Details</h1>
              
               
               <button type="button" class="btn btn-primary modalOpener" data-id="" data-catname="" data-order="" data-status="">
  Add Category
</button>  @if (session()->has('success'))
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
                            
                            <th>Name</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>addedon</th>
                            <th>Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categorys as $values)
                                <tr>
                                  <td>{{$values->ct_name}}</td>
                                  <td>{{$values->ct_order}}</td>
                                  <td>@if($values->ct_status==1)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                </td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');
                                  ?>

                                  <td><?php echo $a; ?></td>
                           
                              

                                <td>
                                  
                              <a type="button" class="fa fa-pencil modalOpener" data-id="{{$values->ct_id}}" data-catname="{{$values->ct_name}}" data-order="{{$values->ct_order}}" data-status="{{$values->ct_status}}"></a>
                              <!-- <a type="button" class="btn btn-danger" href="{{url('delete/'.$values->ct_id)}}">delete</a> <i class="fa fa-pencil"></i>-->
                              <a type="button" class="fa fa-trash" data-toggle="modal" data-target="#categorydelete" ></a>
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





<div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="catModalHead">Update Category Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="success_message"></div>
      <div class="modal-body">
        <ul id="saveform_errList"></ul>
      
                  <form method="post" action="{{ url('/category_action')}}" id="categoryform">
                      
               @csrf
                    <div class="form-group">
                       <input type="hidden" name="id" id="catId" value=""> 
                      <label for="category">Title</label>
                      <input type="text" class="form-control" placeholder="category" id="catName" name="catName" value="">
                      <span class="text-danger" id="name-error"></span>
                      
                      <!-- @error('category') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                    </div>
                    <div class="form-group">
                      <label for="order">order</label>
                      <input type="text" class="form-control" id="order" placeholder="order" name="order" value="">
                      <span class="text-danger" id="order-error"></span>
                        
                      <!-- @error('order') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" value="1">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" id="status-error"></span>
                        <!-- @error('status') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                      </div>
                    
                     <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="category_btn" id="catModalfooter"></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                     

                  </form>


                 
            
     </div>
   </div>
 </div>
</div>


<!-- delete modal -->

<div class="modal fade" id="categorydelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Category Details</h3>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{url('delete/'.$values->ct_id)}}">Delete</a>
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
  myname=$(this).data("catname");
  myorder=$(this).data("order");
  mystatus=$(this).data("status");
  $("#catModalHead").html(myid?"Update Category Details":"Create Category");
  $("#catModalfooter").html(myid?"save changes":"save");
  $("#catId").val(myid);
  $("#catName").val(myname);
  $("#order").val(myorder);
  $("#status").val(mystatus);
  // catName
  $("#catModal").modal("show");
  $("#name-error,#order-error,#status-error").html("");
}); //end of modalopener

 $('#categoryform').on('submit',function(e){
     e.preventDefault();

    let catName = $('#catName').val();
     let order = $('#order').val();
    let status = $('#status').val();
    
     $.ajax({
       url: "/category_action",
       type:"POST",
       data:{
         "_token": "{{ csrf_token() }}",
         catName:catName,
         order:order,
         status:status,
         id:$("#catId").val()
       },
       success:function(response){
         $('#successMsg').show();
         console.log(response);
         $("#catModal").modal("hide");
         window.location.reload();
       },
       error: function(response) {
         $('#name-error').text(response.responseJSON.errors.catName);
         $('#order-error').text(response.responseJSON.errors.order);
         $('#status-error').text(response.responseJSON.errors.status);
       },
       });
     });



 }); 

</script>       
@endsection

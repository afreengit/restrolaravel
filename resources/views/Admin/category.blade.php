@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Category Details</h1>
               <!--<a href="/add_category" class="btn btn-primary">Add Category</a>-->
               <button type="button" class="btn btn-primary modalOpener"  data-id="" data-catname="" data-order="0" data-active="0">
  Add Category
</button> 
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
                                  <td>{{$values->ct_status}}</td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');
                                  ?>

                                  <td><?php echo $a; ?></td>
                           
                              

                                <td>
                                  
                              <a class="btn btn-primary modalOpener" data-id="{{$values->ct_id}}" data-catname="{{$values->ct_name}}" dat-order="{{$values->ct_order}}" data-active="{{$values->ct_status}}">edit</a>
                              <a type="button" class="btn btn-danger" href="{{url('delete/'.$values->ct_id)}}">delete</a>
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
      <div class="modal-body">
      
                  <form method="post" action="{{ url('/category_action')}}">
               @csrf
                    <div class="form-group">
                       <input type="hidden" name="id" id="catId" value=""> 
                      <label for="category">Title</label>
                      <input type="text" class="form-control"  placeholder="category" id="catName" name="category" value="">
                    </div>
                    <div class="form-group">
                      <label for="order">order</label>
                      <input type="text" class="form-control" id="order" placeholder="order" name="order" value=""> 
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status"  >
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                     <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn" id="catModalfooter">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                  </form>
                 
            
     </div>
   </div>
 </div>
</div>
 
@endsection
@section("script")
<script type="text/javascript">
$(document).ready(function(){
$(".modalOpener").click(function(btn){
  btn.preventDefault();
  myid=$(this).data("id");
  myname=$(this).data("catname");
  $("#catModalHead").html(myid?"Update Category Details":"Create Category");
  $("#catModalfooter").html(myid?"save changes":"save");
  $("#catId").val(myid);
  $("#catName").val(myname);
  // catName
  $("#catModal").modal("show");
});  
  
});  

</script>       
@endsection

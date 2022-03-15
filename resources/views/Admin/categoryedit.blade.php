    @extends("Admin.layout")
@section("content")
    <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">update
  
</button>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            
            <form method="post" action="{{ url('/edit_action')}}">
               @csrf

               
          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <form class="forms-sample">
                    <div class="form-group">
                       <input type="hidden" name="id" value="{{$data->ct_id}}"> 
                      <label for="category">Title</label>
                      <input type="text" class="form-control" id="category" placeholder="category" name="category" value="{{$data->ct_name}}">
                    </div>
                    <div class="form-group">
                      <label for="order">order</label>
                      <input type="text" class="form-control" id="order" placeholder="order" name="order" value="{{$data->ct_order}}"> 
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" value="{{$data->ct_status}}"> >
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                     <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="coupon_btn">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>

        @endsection
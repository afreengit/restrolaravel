    @extends("Admin.layout")
@section("content")
    <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <!-- <form method="post" action="/insert_action"> -->
            <!-- @csrf -->
            
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('/insert_action')}}">
      <div class="modal-body">
        ... 
               @csrf
          <div class="row">
      <h1 class="card-title ml10">Add Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="category">Title</label>
                      <input type="text" class="form-control" id="category" placeholder="category" name="category">
                    </div>
                    <div class="form-group">
                      <label for="order">order</label>
                      <input type="text" class="form-control" id="order" placeholder="order" name="order">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
            
        @endsection
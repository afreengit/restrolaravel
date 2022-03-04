    @extends("Admin.layout")
    @section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add deliveryboy</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          <form method="post" action="{{ url('/adddeliveryboy_action')}}">
             @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="delivery" placeholder="Name" name="del">
                    </div>
                    <div class="form-group">
                      <label for="order">Mobile</label>
                      <input type="text" class="form-control" id="mob" placeholder="mobile" name="mob">
                    </div>
                    <div class="form-group">
                      <label for="status" id="status">Status</label>
                        <select class="form-control" id="status" name="status">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="addedon">Addedon</label> 
                      <input type="date" class="form-control" id="added" placeholder="date" name="add">
                    </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="delivery_btn">Submit</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>
    @endsection
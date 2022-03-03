    @extends("Admin.layout")
    @section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->

          <form method="post" action="{{ url('/adddeliveryboy_action')}}">
             @csrf
          <div class="row">
      <h1 class="card-title ml10">Add</h1>
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
                    
                    <button type="submit" class="btn btn-primary mr-2" name="delivery_btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>
    @endsection
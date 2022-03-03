    @extends("Admin.layout")
@section("content")
    <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <!-- <form method="post" action="/insert_action"> -->
            <!-- @csrf -->
            <form method="post" action="{{ url('/addlocation_action')}}">
               @csrf
          <div class="row">
      <h1 class="card-title ml10">Add Locations</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="category">Location</label>
                      <input type="text" class="form-control" id="location" placeholder="location" name="location">
                    </div>
                    
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="deliverystatus">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="order"> DeliveryCharge</label>
                      <input type="text" class="form-control" id="delcharge" placeholder="Delivery charge" name="delivery">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>

        @endsection
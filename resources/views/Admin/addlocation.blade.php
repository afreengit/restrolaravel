    @extends("Admin.layout")
@section("content")
    <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <!-- <form method="post" action="/insert_action"> -->
            <!-- @csrf -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Locations
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
                          <option value="0">Active</option>s
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="order"> DeliveryCharge</label>
                      <input type="text" class="form-control" id="delcharge" placeholder="Delivery charge" name="delivery">
                    </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>

        @endsection
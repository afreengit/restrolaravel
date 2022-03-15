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
        <h1 class="modal-title" id="exampleModalLabel">Update Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          <form method="post" action="{{ url('/editdeliveryboy_action')}}">
             @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="form-group">
                      <input type="hidden" name="id" value="{{$delivery->dl_id}}"> 
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="del" placeholder="Name" name="del" value="{{$delivery->dl_name}}">
                    </div>
                    <div class="form-group">
                      <label for="order">Mobile</label>
                      <input type="text" class="form-control" id="mob" placeholder="mobile" name="mob" value="{{$delivery->dl_mob}}">
                    </div>
                    <div class="form-group">
                      <label for="status" id="status">Status</label>
                        <select class="form-control" id="status" name="status" value="{{$delivery->dl_status}}">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="delivery_btn">Save Changes</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        
    @endsection
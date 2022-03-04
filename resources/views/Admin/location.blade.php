@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Location Details</h1>
              <!-- <a href="/location" class="btn btn-primary">Add locations</a> -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Add Locations
              </button>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>location</th>
                            <th>status</th>
                            <th>Delivery Charge</th>
                            <th>Addedon</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($locations as $values)  
                        <tr>
                            <td>{{$values->lo_name}}</td>
                                  <td>@if($values->lo_status==1)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                </td>
                                  <td>{{$values->lo_deliverycharge}}</td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>
                            
                            
                        </tr>
                        @endforeach
                        

                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>


         

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add Locations</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form method="post" action="{{ url('/addlocation_action')}}">
               @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
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
		
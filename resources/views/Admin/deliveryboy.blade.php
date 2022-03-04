@extends("Admin.layout")
@section("content")

      <!-- partial -->
      <!-- <div class="main-panel"> -->
        <!-- <div class="content-wrapper"> -->
          <div class="card">
            <div class="card-body">
              <h1>employee Details</h1>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
  </button>
              <!--<a href="/deliveryboy" class="btn btn-primary">Add</a>-->
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                   
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Addedon</th>
                            <th></th>

                        </tr>
                      </thead>
                      <tbody>
                       @foreach($deliveryboys as $values)
                        <tr>
                            <td>{{$values->dl_name}}</td>
                                  <td>{{$values->dl_mob}}</td>
                                  <td>{{$values->dl_status}}</td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>
                            <td><a href="edit/{{$values->dl_id}}" class="btn btn-primary">edit</a></td>
                            
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

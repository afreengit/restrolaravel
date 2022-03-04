@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Category Details</h1>
               <!--<a href="/add_category" class="btn btn-primary">Add Category</a>-->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                            <th></th>
                            
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
                           
                              <!-- <td><a class="btn btn-primary" href="edit/.{{$values->ct_id}}" >edit</a> -->
                                <td><a class="btn btn-primary" href="{{ url('edit/'.$values->ct_id)}}">edit</a>
                              <a class="btn btn-primary" href="{{'delete/'.$values->ct_id}}" >delete</a>
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('/insert_action')}}">
      <div class="modal-body">
         
               @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
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
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn">Submit</button>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
       

      </div>


      
      
       </form>
    </div>
  </div>
</div>
            


@endsection
		
@extends("Admin.layout")
@section("content")
      
          <div class="card">
            <div class="card-body">
              <h1>Dish Details</h1>
                <a href="/dish-details" class="btn btn-primary">Add Dish</a>  
               


              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>category</th>
                            <th>Dish</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dish as $values)  
                        <tr>
                          
                          
                     <td>{{ $values->category->ct_name }}</td> 
                          

                          
                            <td>{{ $values->dm_name }}</td>
                                  
                                  <td>@if($values->dm_type==0)
                                    <span class="btn btn-success">Veg</span>
                                  @else
                                  <span class="btn btn-danger">Nonveg</span>
                                  @endif
                                </td>
                                 
                                  <td><img src="{{url('uploads/dishimage/'.$values->dm_image)}}"></td>
                                  <td>@if($values->dm_status==1)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                 </td> 

                                  <td>{{ $values->dishdetail->dd_portion }}</td>
                                    
                                     

                                  <td>
                                    
                                    
                                     <a type="button" class="fa fa-pencil" href="{{ url('editdish/'.$values->dm_id)}}" ></a>
                                  
                              <a class="fa fa-trash" data-toggle="modal" data-target="#dishdelete" ></a>
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

<!-- delete modal -->
<div class="modal fade" id="dishdelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Dish Details</h3>
       
      </div>
      <div class="modal-body">
      Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{'deletedish/'.$values->dm_id}}">Delete</a>
      </div>
    </div>
  </div>
</div>


@endsection


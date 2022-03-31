@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Dish Details</h1>
                <a href="/dish-details" class="btn btn-primary">Add Dish</a>  
               <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Dish -->
  
</button>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Portion</th>
                            <th>Offerprice</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Addedon</th>
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dishmasters as $values)  
                        <tr>
                            <td>{{$values->dd_portion}}</td>
                                  <td>{{$values->dd_offerprice}}</td>
                                  <td>@if($values->dm_type==1)
                                    <span class="btn btn-success">Veg</span>
                                  @else
                                  <span class="btn btn-danger">Nonveg</span>
                                  @endif
                                </td>
                                  <!-- <td>{{$values->dm_type}}</td> -->
                                  <!-- <td><img src="{{URL::to($values->dm_image)}}"></td> -->
                                  <td><img src="{{url('uploads/dishimage/'.$values->dm_image)}}"></td>
                                  <td>@if($values->dm_status==0)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                </td>

                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>

                                  <td><a type="button" class="btn btn-primary" href="{{ url('editdish/'.$values->dm_id)}}" >edit</a>
                                  
                              <a class="btn btn-primary" href="{{'deletedish/'.$values->dm_id}}" >delete</a>
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
@endsection
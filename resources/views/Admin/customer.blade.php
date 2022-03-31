@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Customer Details</h1>
                <!-- <a href="/dish-details" class="btn btn-primary">Add Dish</a>   -->
               <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Dish 
  
                </button>-->


              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>emai</th>
                            <th>phone</th>
                            <th>HomeAddress</th>
                            <th>officeAddress</th>
                            <th>status</th>
                            
                            

                        </tr>
                      </thead>
                      <tbody>
                         @foreach($users as $values)   
                        <tr>
                          
                          <td>{{$values->u_name}}</td>
                          
                            <td>{{$values->u_email}}</td>
                                  
                                 
                                 

                                  <td>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">portion details</button>
                                    <div class="collapse" id="collapseExample">
                                      <div class="card card-body">{{$values->
                                        dm_name}}
    
                                      </div>
                                      </div>
                                  </td>

                                  <td>
                                    
                                     <!-- <a type="button" class="btn btn-primary" href="{{ url('editdish/'.$values->dm_id)}}" >edit</a> -->
                                     <!-- <a type="button" class="btn btn-primary" href="{{ url('editdish/'.$values->dm_id)}}" >edit</a> -->
                                  
                              <!-- <a class="btn btn-primary" href="{{'deletedish/'.$values->dm_id}}" >delete</a> -->
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
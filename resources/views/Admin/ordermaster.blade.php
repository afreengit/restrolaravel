@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Order Details</h1>
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
                            <th>total amount</th>
                            <th>deliveryboy</th>
                            <th>paymentmode</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>locations</th>
                            <th>payment status</th>
                            <th>order status</th>
                            <th>cancelled</th>
                            <th>payment status</th>
                            <th>order Date</th>
                            

                        </tr>
                      </thead>
                      <tbody>
                         @foreach($ordermasters as $values)   
                        <tr>
                          
                          <td>{{$values->u_id}}</td>
                          
                            <td>{{$values->om_totalprice}}</td>
                                  
                                 
                                 

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
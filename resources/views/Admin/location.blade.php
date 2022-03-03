@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Coupon Code</h1>
              <a href="/addlocation" class="btn btn-primary">Add locations</a>
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
                                  <td>{{$values->lo_status}}</td>
                                  <td>{{$values->lo_deliverycharge}}</td>
                                  <td>{{$values->created_at}}</td>
                            
                            
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
		
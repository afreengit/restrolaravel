@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Coupon Details</h1>
               <!-- <a href="/add_coupon" class="btn btn-primary">Add coupon</a>  -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Coupon
  
</button>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Code</th>
                            <th>Value</th>
                            <th>mininmum Cart</th>
                            <th>Expiry</th>
                            <th>Status</th>
                            <th>Addedon</th>
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($coupons as $values)  
                        <tr>
                            <td>{{$values->cp_code}}</td>
                                  <td>{{$values->cp_value}}</td>
                                  <td>{{$values->cp_cartmin}}</td>
                                  <td>{{$values->cp_expiry}}</td>
                                  <td>{{$values->cp_status}}</td>

                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>

                                  <td><a type="button" class="btn btn-primary" href="{{ url('editcpn/'.$values->cp_id)}}" >edit</a>
                                  
                              <a class="btn btn-primary" href="{{'deletecpn/'.$values->cp_id}}" >delete</a>
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

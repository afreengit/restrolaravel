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

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add Coupon</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form method="post" action="{{ url('/addcoupon_action')}}">
            @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <label for="category">Coupon Code</label>
                      <input type="text" class="form-control" id="code" placeholder="coupon code" name="code">
                    </div>
                    <div class="form-group">
                      <label for="order">Coupon Value</label>
                      <input type="text" class="form-control" id="value" placeholder="coupon value" name="value">
                    </div>
                    <div class="form-group">
                      <label for="order">Min Cart Value</label>
                      <input type="text" class="form-control" id="cart" placeholder="minimum value" name="cart">
                    </div>
                    <div class="form-group">
                      <label for="order">Expire Date</label>
                      <input type="date" class="form-control" id="expire" placeholder="Expiry Date" name="expire">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="coupon_btn">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
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
		@section("script")
<script type="text/javascript">
$(document).ready(function(){
$(".modalOpener").click(function(btn){
  btn.preventDefault();
  myid=$(this).data("id");
  myname=$(this).data("catname");
  $("#catModalHead").html(myid?"Update Category Details":"Create Category");
  $("#catModalfooter").html(myid?"save changes":"save");
  $("#catId").val(myid);
  $("#catName").val(myname);
  // catName
  $("#catModal").modal("show");
});  
  
});  

</script>       
@endsection
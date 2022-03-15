    @extends("Admin.layout")
    @section("content")
      
      <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#couponModal">update
  
</button>  

<!-- Modal -->
<div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Update Coupon Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form method="post" action="{{ url('/editcoupon_action')}}">
            @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                       <input type="hidden" name="id" value="{{$coupon->cp_id}}"> 
                      <label for="category">Coupon Code</label>
                      <input type="text" class="form-control" id="code" placeholder="coupon code" name="code" value="{{$coupon->cp_code}}">
                    </div>
                    <div class="form-group">
                      <label for="order">Coupon Value</label>
                      <input type="text" class="form-control" id="value" placeholder="coupon value" name="value" value="{{$coupon->cp_value}}">
                    </div>
                    <div class="form-group">
                      <label for="order">Min Cart Value</label>
                      <input type="text" class="form-control" id="cart" placeholder="minimum value" name="cart" value="{{$coupon->cp_cartmin}}">
                    </div>
                    <div class="form-group">
                      <label for="order">Expire Date</label>
                      <input type="date" class="form-control" id="expire" placeholder="Expiry Date" name="expire" value="{{$coupon->cp_expiry}}">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" value="{{$coupon->cp_status}}">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="coupon_btn">Save Changes</button>
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
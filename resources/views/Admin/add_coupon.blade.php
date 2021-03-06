    @extends("Admin.layout")
    @section("content")
      
      <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          

<!-- Modal -->
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
      <h1 class="card-title ml10">Add Coupon</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>
    @endsection
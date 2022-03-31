    @extends("Admin.layout")
    @section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pwdModal">
  </button>

<!-- Modal -->
<div class="modal fade" id="pwdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Change Password</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          <form method="post" action="{{ url('/changepwd_action')}}">
             @csrf
          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="oldpwd">Old Password</label>
                      <input type="text" class="form-control" id="oldpwd" placeholder="Old password" name="oldpwd">
                    </div>
                    <div class="form-group">
                      <label for="newpwd">New Password</label>
                      <input type="password" class="form-control" id="newpwd" placeholder="New Password" name="newpwd">
                    </div>
                    
                      <div class="form-group">
                      <label for="cfmpwd">Confirm Password</label> 
                      <input type="password" class="form-control" id="confirmpwd" placeholder="Confirm Pasword" name="confirmpwd">
                    </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="delivery_btn">Submit</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>
    @endsections
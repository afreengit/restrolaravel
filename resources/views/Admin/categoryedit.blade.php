    @extends("Admin.layout")
@section("content")
    <!-- partial -->
      <!--<div class="main-panel">-->      
        <!--<div class="content-wrapper">-->
          <!-- <form method="post" action="/insert_action"> -->
            <!-- @csrf -->
            
            <!-- <form method="post" action="{{ url('/edit_action')}}"> -->
              <form method="post" action="{{ url('/edit_action')}}">
               @csrf
          <div class="row">
      <h1 class="card-title ml10">Update Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <form class="forms-sample">
                    <div class="form-group">
                      <!-- <input type="hidden" name="id" value="{{$data->ct_id}}"> -->
                      <label for="category">Title</label>
                      <input type="text" class="form-control" id="category" placeholder="category" name="category" value="{{$data->ct_name}}">
                    </div>
                    <div class="form-group">
                      <label for="order">order</label>
                      <input type="text" class="form-control" id="order" placeholder="order" name="order" value="{{$data->ct_order}}"> 
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" value="{{$data->ct_status}}"> >
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
     </div>
        </form>

        @endsection
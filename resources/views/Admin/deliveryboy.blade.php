@extends("Admin.layout")
@section("content")

      <!-- partial -->
      <!-- <div class="main-panel"> -->
        <!-- <div class="content-wrapper"> -->
          <div class="card">
            <div class="card-body">
              <h1>employee Details</h1>
              <a href="/add_deliveryboy" class="btn btn-primary">Add</a>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                   
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Addedon</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($deliveryboys as $values)
                        <tr>
                            <td>{{$values->dl_name}}</td>
                                  <td>{{$values->dl_mob}}</td>
                                  <td>{{$values->dl_status}}</td>
                                  <td>{{$values->created_at}}</td>
                            <td><a href="edit/{{$values->dl_id}}" class="btn btn-primary">edit</a></td>
                            
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

@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Category Details</h1>
              <a href="/add_category" class="btn btn-primary">Add Category</a>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>addedon</th>
                            <th>addedon</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categorys as $values)
                                <tr>
                                  <td>{{$values->ct_name}}</td>
                                  <td>{{$values->ct_order}}</td>
                                  <td>{{$values->ct_status}}</td>
                                  <td>{{$values->created_at}}</td>
                           
                              <!-- <td><a class="btn btn-primary" href="edit/.{{$values->ct_id}}" >edit</a> -->
                                <td><a class="btn btn-primary" href="{{ url('edit/'.$values->ct_id)}}">edit</a>
                              <a class="btn btn-primary" href="{{'delete/'.$values->ct_id}}" >delete</a>
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
		
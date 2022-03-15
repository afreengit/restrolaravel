@extends("Admin.layout")
@section("content")

      <!-- partial -->
      <!-- <div class="main-panel"> -->
        <!-- <div class="content-wrapper"> -->
          <div class="card">
            <div class="card-body">
              <h1>employee Details</h1>
               <button type="button" class="btn btn-primary modalOpener" data-id="" data-delname="" data-mob="" data-active="0">Add
  </button>
              <!--<a href="/deliveryboy" class="btn btn-primary">Add</a>-->
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
                            <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                       @foreach($deliveryboys as $values)
                        <tr>
                            <td>{{$values->dl_name}}</td>
                                  <td>{{$values->dl_mob}}</td>
                                  <td>{{$values->dl_status}}</td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');

                                  ?>

                                  <td><?php echo $a; ?></td>
                                  <td><a class="btn btn-primary modalOpener" data-id="{{$values->dl_id}}" data-delname="{{$values->dl_name}}" dat-mob="{{$values->dl_mob}}" data-active="{{$values->dl_status}}">edit</a>
                              <a type="button" class="btn btn-danger" href="{{url('deletedel/'.$values->dl_id)}}">delete</a></td>
                            
                            <!-- <td><a type="button" class="btn btn-success" href="{{ url('editdel/'.$values->dl_id)}}" >edit</a> -->
                              <!-- <a class="btn btn-danger deletedeleverybtn" href="{{'deletedel/'.$values->dl_id}}" >delete</a> -->

                        </tr>
                         @endforeach

                      </tbody>
                    </table>
                  </div>
        </div>
              </div>
            </div>
          </div>


<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="delModalHead">Update Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          <form method="post" action="{{ url('/editdeliveryboy_action')}}">
             @csrf

          <div class="row">
      <h1 class="card-title ml10"></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="form-group">
                      <input type="hidden" name="id" value="" id="delId"> 
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="del" placeholder="Name" name="del" value="">
                    </div>
                    <div class="form-group">
                      <label for="order">Mobile</label>
                      <input type="text" class="form-control" id="mob" placeholder="mobile" name="mob" value="">
                    </div>
                    <div class="form-group">
                      <label for="status" id="status">Status</label>
                        <select class="form-control" id="status" name="status" value="">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                        </select>
                      </div>
                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="delivery_btn">Save Changes</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
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
  myname=$(this).data("del");
  $("#delModalHead").html(myid?"Update deliveryboys Details":"Create deliveryboys");
  $("#delModalfooter").html(myid?"save changes":"save");
  $("#delId").val(myid);
  $("#del").val(myname);
  // catName
  $("#delModal").modal("show");
});  
  
});  

</script>       
@endsection
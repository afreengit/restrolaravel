@extends("Admin.layout")
@section("content")
      <!-- partial -->
      <!--<div class="main-panel">-->
        <!--<div class="content-wrapper">-->
          <div class="card">
            <div class="card-body">
              <h1>Category Details</h1>
              
               
               <button type="button" class="btn btn-primary modalOpener"  data-id="" data-uname="" data-email="" data-active="0">
  Add 
</button>  @if (session()->has('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}
                  </div>
                    @endif

                    @if (session()->has('message'))
                  <div class="alert alert-danger">
                    {{ session()->get('message') }}
                  </div>
                    @endif
                    
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>addedon</th>
                            <th>Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($admins as $values)
                                <tr>
                                  <td>{{$values->ad_uname}}</td>
                                  <td>{{$values->ad_email}}</td>
                                  <td>@if($values->ct_status==1)
                                    <span class="btn btn-success">active</span>
                                  @else
                                  <span class="btn btn-danger">Inactive</span>
                                  @endif
                                </td>
                                  <?php
                                  $a=$values->created_at->format('d/m/Y');
                                  ?>

                                  <td><?php echo $a; ?></td>
                           
                              

                                <td>
                                  
                              <a class="btn btn-primary modalOpener" data-id="{{$values->ad_id}}" data-uname="{{$values->ad_uname}}" data-email="{{$values->ad_email}}" data-active="{{$values->ad_status}}">edit</a>
                              <a type="button" class="btn btn-danger" href="{{url('delete/'.$values->ad_id)}}">delete</a>
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





<div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="catModalHead">Admin Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
                  <form method="post" action="{{ url('/admin_action')}}">
                      
               @csrf
                    <div class="form-group">
                       <input type="hidden" name="id" id="adId" value=""> 
                      <label for="uname">Uname</label>
                      <input type="text" class="form-control @error('category') is-invalid @enderror"  placeholder="username" id="username" name="username" value="">
                      <!-- @error('category') -->
                      <!-- <div class="invalid-feedback"> -->
                       <!-- {{ $message }} -->
                      <!-- </div> -->
                      <!-- @enderror -->
                      <!-- @error('category') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                    </div>
                    <div class="form-group">
                      <label for="passwpord">pwd</label>
                      <input type="text" class="form-control @error('order') is-invalid @enderror" id="password" placeholder="password" name="password" value="">
                        @error('order')
                      <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                      <!-- @error('order') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control @error('order') is-invalid @enderror" id="email" placeholder="email" name="email" value="">
                        <!-- @error('order') -->
                      <!-- <div class="invalid-feedback"> -->
                       <!-- {{ $message }} -->
                      <!-- </div> -->
                      <!-- @enderror -->
                      <!-- @error('order') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="active" name="status" value="">
                          <!-- @error('status') -->
                      <!-- <div class="invalid-feedback"> -->
                       <!-- {{ $message }} -->
                      <!-- </div> -->
                      <!-- @enderror -->
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        <!-- @error('status') -->
                  <!-- <div>{{$message}}</div> -->
                  <!-- @enderror -->
                      </div>
                    
                     <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2" name="category_btn" id="catModalfooter">submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                     

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
  myname=$(this).data("uname");
  myemail=$(this).data("email");
  mystatus=$(this).data("active");
  $("#adminModalHead").html(myid?"Update Details":"Create");
  $("#adminModalfooter").html(myid?"save changes":"save");
  $("#adId").val(myid);
  $("#username").val(myname);
  $("#email").val(myemail);
  $("#active").val(mystatus);
  // catName
  $("#catModal").modal("show");
});  
  
});  
@error('category')
$('#catModal').modal('show');
@enderror
@error('order')
$('#catModal').modal('show');
@enderror
@error('status')
$('#catModal').modal('show');
@enderror
</script>       
@endsection

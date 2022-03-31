    @extends("Admin.layout")
@section("content")
    


<!-- Modal -->

      <form method="post" action="{{ url('/editdish_action')}}" enctype="multipart/form-data">
      <div class="modal-body">
         
               @csrf
          <div class="row">
      <h1 class="card-title ml10">Update Dish</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="{{$master->dm_id}}">
                      <label for="category" for="select">Category</label>
                      <div class="controls">
                        <select id="select" name="ct_id" class="form-control">
                          
                          <?php
                          $category=DB::table('categorys')->where('ct_status',1)->get();
                          foreach($category as $d_category){
                            ?>
                            <option value="{{$d_category->ct_id}}">{{$d_category->ct_name}}</option>
                            <?php  
                          }
                          ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="dish">Dish Name</label>
                      
                      <input type="text" class="form-control" id="dish" placeholder="Enter dish name here" name="dish" value="{{$master->dm_name}}">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="dish">Description</label>
                      <textarea class="form-control" id="description" placeholder="Enter dish description here" name="description">{{$master->dm_description}}</textarea>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="status">Type</label>
                        <select class="form-control" id="type" name="type">
                          <option value="0"{{ $master->dm_type=="0" ? 'selected' : ''}}>Veg</option>
                          <option value="1"{{ $master->dm_type=="1" ? 'selected' : ''}}>Nonveg</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="dishimage" placeholder="image" name="dishimage" value="{{$master->dm_image}}">
                      <img src="{{ asset('uploads/dishimage/'.$master->dm_image) }}" width="70px" height="70px">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="dish_status">Status</label>
                        <select class="form-control" id="dish_status" name="dish_status">
                          <option value="1"{{ $master->dm_status=="1" ? 'selected' : ''}}>Active</option>
                          <option value="0"{{ $master->dm_status=="0" ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    <!-- {{$detail}} -->
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Portion</th>
                          <th>Offer Price</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th width="20%">Actions</th>
                          </tr>
                      </thead>
                      @foreach($detail as $values)
                      <tbody id="portionTable">
                          <tr class="cloneTr">
                           <input type="hidden" name="did[]" value="{{$values->dd_id}}">
                          <td ><input type="text" name="portion[]" class="form-control" value="{{$values->dd_portion}}"></td>
                          <td><input type="text" name="offer[]" class="form-control" value="{{$values->dd_offerprice}}"></td>
                          <td><input type="text" name="price[]" class="form-control" value="{{$values->dd_price}}"></td>
                          <td><select class="form-control"  name="portion_status[]">
                            <option value="1"{{ $values->dd_status=="1" ? 'selected' : ''}}>Active</option>
                            <option value="0"{{ $values->dd_status=="0" ? 'selected' : ''}}>Inactive</option>
                          <!-- <option value="1">Active</option> -->
                          <!-- <option value="0">Inactive</option> -->
                        </select></td>
                        


                        <td><a class="btn btn-xs btn-primary addRow" href="javascript:void(0)">Add portion</a></td>
                        <td><a class="btn btn-xs btn-danger removeRow" href="javascript:void(0)">Remove</a></td></tr>

                        @endforeach
                        
                          
                             
                        
                          
                      </tbody>
                      

                    </table>
                    
                     <button type="submit" class="btn btn-primary mr-2" name="dish_btn">Submit</button>
                    <button class="btn btn-light">Cancel</button></div>
                   </div>
                 </div>
                 </div>
                     </form>

            
@endsection
        
    @section("script")
<script type="text/javascript">
$(document).ready(function(){
//addRow removeRow cloneTr
$(document).on("click",".addRow",function(){
tbl=$("#portionTable");
cln=$(this).closest("tr").clone();
cln.find(".form-control").val("");
$(this).next(".removeRow").removeClass("collapse");
cln.appendTo(tbl);
$(this).addClass("collapse");
});
$(document).on("click",".removeRow",function(){
$(this).closest("tr").remove();
});
});
  
</script>       
@endsection
    
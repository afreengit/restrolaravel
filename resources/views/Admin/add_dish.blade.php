    @extends("Admin.layout")
@section("content")
    


<!-- Modal -->

      <form method="post" action="{{ url('/adddish_action')}}" enctype="multipart/form-data">
      <div class="modal-body">
         
               @csrf
          <div class="row">
      <h1 class="card-title ml10">Add Dish</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="form-group">
                      <label for="category" for="select">Category</label>
                      <div class="controls">
                        <select id="select" name="ct_id">
                          <option>select category</option>
                          <?php
                          $category=DB::table('categorys')->where('ct_status',0)->get();
                          foreach($category as $d_category){
                            ?>
                            <option value="{{$d_category->ct_id}}">{{$d_category->ct_name}}</option>
                            <?php  
                          }
                          ?>
                        </select>
                    </div>
                    </div>
                  
                    <div class="form-row">
                      <label for="dish">Dish Name</label>
                      <input type="text" class="form-control" id="dish" placeholder="Enter dish name here" name="dish">
                    </div>

                    <div class="form-row">
                      <label for="dish">Description</label>
                      <input type="text" class="form-control" id="description" placeholder="Enter dish description here" name="description">
                    </div>
                    <div class="form-group">
                      <label for="status">Type</label>
                        <select class="form-control" id="type" name="type">
                          <option value="1">Veg</option>
                          <option value="0">Nonveg</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="dishimage" placeholder="image" name="dishimage">
                    </div>
                    <div class="form-group">
                      <label for="dish_status">Status</label>
                        <select class="form-control" id="dish_status" name="dish_status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- dish detail begins -->
                    <div class="portionprice" id="portionprice">
                    <div class="form-group">
                      <label for="status">Portion</label>
                        <input type="text" class="form-control" id="portion" placeholder="portion" name="portion">
                      </div>
                    <div class="form-group">
                      <label for="order">offer Price</label>
                      <input type="text" class="form-control" id="offer" placeholder="offerprice" name="offer">
                    </div>
                    <div class="form-group">
                      <label for="order">Price</label>
                      <input type="text" class="form-control" id="price" placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                      <label for="portion_status">Status</label>
                        <select class="form-control" id="portion_status" name="portion_status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>
                      <!-- dish detail ends -->
                    
                    <div class="modal-footer">
                      <button class="btn btn-success" id="btnTest">add</button>
                    <button type="submit" class="btn btn-primary mr-2" name="dish_btn">Submit</button>
                    <button class="btn btn-light">Cancel</button></div>
                     </div>
                   </div>
                 </div>
                 </div>
                     </form>

            
@endsection
        
    @section("script")
<script type="text/javascript">
$(document).ready(function(){
  $('#btnTest').on('click',function(e){
    e.preventDefault();
    var html='';
    html+='<div>';
    html+='<div class="form-group"><label for="status">Portion</label><input type="text" class="form-control" id="portion" placeholder="portion" name="portion"></div>';
    html+='<div class="form-group"><label for="order">offer Price</label><input type="text" class="form-control" id="offer" placeholder="offerprice" name="offer"></div>';
    html+='<div class="form-group"><label for="order">Price</label><input type="text" class="form-control" id="price" placeholder="price" name="price"></div>'
    html+='<div class="form-group"><label for="status">Status</label><select class="form-control" id="status" name="status"><option value="1">Active</option><option value="0">Inactive</option></select></div>'
    html+='<button type="button" class="btn btn-primary" id="remove">delete</button>'; 
    $('#portionprice').append(html);
     html+='</div>';
  })

  
});  

$(document).on('click','#remove',function(){
  $(this).closest('div').remove();
})

</script>       
@endsection
    
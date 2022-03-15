<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorys;
use App\Models\deliveryboys;
use App\Models\coupons;
use App\Models\locations;
use App\Models\dishdetails;
use App\Models\dishmasters;

use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    // viewing pages

    public function index()
    {
        $category=categorys::all();
        
        return view("Admin.category",["categorys"=>$category]);
    }

     public function delindex()
    {
        $delivery=deliveryboys::all();
        return view("Admin.deliveryboy",["deliveryboys"=>$delivery]);
    }

    public function couponindex()
    {
        $coupon=coupons::all();
        return view("Admin.coupon",["coupons"=>$coupon]);
    }

     public function locationindex()
    {
        $location=locations::all();
        return view("Admin.location",["locations"=>$location]);
    }
    public function dishindex()
    {
        $dish=dishdetails::all();
        return view("Admin.add_dish",["dishdetails"=>$dish]);
    }
    public function dishdetails()
    {
        $dish=dishdetails::all();
        return view("Admin.create-edit-dish",["dishdetails"=>$dish]);
    }


    // adding pages

    public function addcategoryaction(Request $request)
    {
        // $a=$request->post('order');
        // dd($a);
        $category=new categorys();
        $category->ct_name=$request->input('category');
        $category->ct_order=$request->input('order');
        $category->ct_status=$request->input('status');
        $category->save();
        return redirect('/category');
    }

    public function adddeliverboyaction(Request $request)
    {
        $delivery=new deliveryboys();
        $delivery->dl_name=$request->input('delivery');
        $delivery->dl_mob=$request->input('mob');
        $delivery->dl_status=$request->input('status');
        $delivery->save();
        return redirect('/deliveryboy');
    }

     public function addcouponaction(Request $request)
    {
        $coupon=new coupons();
        $coupon->cp_code=$request->input('code');
        $coupon->cp_value=$request->input('cart');
        $coupon->cp_cartmin=$request->input('value');
        $coupon->cp_expiry=$request->input('expire');
        $coupon->cp_status=$request->input('status');
        $coupon->save();
        return redirect('/coupon');
    }

     public function addlocationaction(Request $request)
    {
        $location=new locations();
        $location->lo_name=$request->input('location');
        $location->lo_deliverycharge=$request->input('delivery');
        $location->lo_status=$request->input('deliverystatus');
        $location->save();
        return redirect('/location');
    }
    public function adddishaction(Request $request)
    {
        $master=new dishmasters();
        $master->ct_id=$request->input('ct_id');
        $master->dm_name=$request->input('dish');
        $master->dm_description=$request->input('description');
        $master->dm_type=$request->input('type');
        $master->dm_type=$request->input('dish_status');
        if($request->hasfile('dishimage'))
        {
            $file=$request->file('dishimage');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/dishimage',$filename);
            $master->dm_image=$filename;
        }
        $master->save();
        //dd($master);
       $portions= $request->input('portion');
       $offers= $request->input('offer');
       $prices= $request->input('price');
       $statusarray= $request->input('portion_status');
       foreach($portions as $index=>$portion){
        $dish=new dishdetails();
        $dish->dd_portion=$portion;
        $dish->dd_offerprice=$offers[$index];
        $dish->dd_price=$prices[$index];
        $dish->dd_status=$statusarray[$index];
        $dish->dm_id=$master->dm_id;
        $dish->save();
       }
        

        return redirect('/dish-details');
    }


    // edit action
    public function editcategory($ct_id)
    { 
        $data=categorys::find($ct_id);

        return view('Admin.categoryedit',compact('data'));
    }

    public function editdeliveryboy($dl_id)
    {
        $delivery=deliveryboys::find($dl_id);
        return view('Admin.editdeliveryboy',compact('delivery'));
    }

    public function editcoupon($cp_id)
    {
        $coupon=coupons::find($cp_id);
        return view('Admin.editcoupon',compact('coupon'));
    }

    public function editlocation($lo_id)
    {
        $location=locations::find($lo_id);
        return view('Admin.editlocation',compact('location'));
    }



    // update action
    public function updatecategory(Request $request)
    {

        $id=$request->post('id');
        if($id){
        $cat=categorys::find($id);}
        else{
        $cat=new categorys();     
        }
        $cat->ct_name=$request->post('category');
        $cat->ct_order=$request->post('order');
        $cat->ct_status=$request->post('status');
        $cat->save();
        return redirect('/category');
    }

     //update deliveryboy
    
    public function updatedeliveryboy(Request $request)
    {
        $id=$request->post('id');
        $del=deliveryboys::find($id);
        $del->dl_name=$request->post('del');
        $del->dl_mob=$request->post('mob');
        $del->dl_status=$request->post('status');
        $del->save();
        return redirect('/deliveryboy');
    }

    //update coupon

    public function updatecoupon(Request $request)
    {
        $id=$request->post('id');
        $cpn=coupons::find($id);
        $cpn->cp_code=$request->post('code');
        $cpn->cp_value=$request->post('value');
        $cpn->cp_cartmin=$request->post('cart');
        $cpn->cp_expiry=$request->post('expire');
        $cpn->cp_status=$request->post('status');
        $cpn->save();
        return redirect('/coupon');
    }

    //update location

     public function updatelocation(Request $request)
    {
        $id=$request->post('id');
        $loc=locations::find($id);
        $loc->lo_name=$request->post('location');
        $loc->lo_status=$request->post('deliverystatus');
        $loc->lo_deliverycharge=$request->post('delivery');
        $loc->save();
        return redirect('/location');
    }
    
    // delete category
    public function categorydelete($ct_id)
    {
    
        $data=categorys::find($ct_id);
        $data->delete();
        return redirect('/category');
    }

    //delete deliveryboy
    public function deliveryboydelete($dl_id)
    {
    
        $delivery=deliveryboys::find($dl_id);
        $delivery->delete();
        return redirect('/deliveryboy');
    }
    
    //delete coupon
     public function coupondelete($cp_id)
    {
    
        $coupon=coupons::find($cp_id);

        $coupon->delete();
        return redirect('/coupon');
    }

    //delete location
    public function locationdelete($lo_id)
    {
    
        $location=locations::find($lo_id);

        $location->delete();
        return redirect('/location');
    }

    //adminlogin

    public function loginaction(Request $request)
    {
         $request->validate([
            'email' =>"required|email",
             'password' => 'required|max:10']);    
        
        $admin_email=$request->email;
        
        $admin_password=$request->password;
        $result=DB::table('admins')->where('ad_email',$admin_email)->where('ad_pwd',$admin_password)->first();

        
                                

        if($result){
            Session::put('adminname',$result->ad_uname);
            Session::put('adminid',$result->ad_id);
            return redirect('/adminhome');
        }else{
            Session::put('message','Email or password invalid');
            return redirect('/admin');
        }
        }

    public function logout(Request $request)
    {
      Auth::logout();
      Session::flush();
      return redirect('/admin');
    }
}





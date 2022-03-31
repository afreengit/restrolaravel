<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorys;
use App\Models\deliveryboys;
use App\Models\coupons;
use App\Models\locations;
use App\Models\dishdetails;
use App\Models\dishmasters;
use App\Models\admins;
use App\Models\ordermasters;
use App\Models\users;



use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    //adminlogin

    public function loginaction(Request $request)
    {
         $request->validate([
            'email' =>"required|email",
             'password' => 'required|max:10']);    
        $admin_email=$request->email;
        $admin_password=$request->password;
        $result=DB::table('admins')->where('ad_email',$admin_email)->where('ad_pwd',$admin_password)->first();                      
        if($result)
        {
            Session::put('adminname',$result->ad_uname);
            Session::put('adminid',$result->ad_id);
            return redirect('/adminhome');
        }
        else
        {
            Session::put('msg','Email or password invalid');
            return redirect('/admin');
        }
    }

    public function logout(Request $request)
    {
      Auth::logout();
      Session::flush();
      return redirect('/admin');
    }

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

         $dish=dishmasters::with('category','dishdetail')->get();
        //$dish=dishmasters::all();
         //dd($dish);
        return view("Admin.dish",compact('dish'));
    }

    public function adminindex()
    {
        $admin=admins::all();
        return view("Admin.admin",["admins"=>$admin]);
    }
     public function orderindex()
    {
        $order=ordermasters::all();
        return view("Admin.ordermaster",["ordermasters"=>$order]);
    }
     public function userindex()
    {
        $user=users::all();
        return view("Admin.customer",["users"=>$user]);
    }
     public function changepwd()
    {
        $user=admins::all();
        return view("Admin.changepassword",["admins"=>$user]);
    }




    
    public function adddishaction(Request $request)
    {
        $master=new dishmasters();
        $master->ct_id=$request->input('ct_id');
        $master->dm_name=$request->input('dish');
        $master->dm_description=$request->input('description');
        $master->dm_type=$request->input('type');
        $master->dm_status=$request->input('dish_status');
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
       foreach($portions as $index=>$portion)
       {
        $dish=new dishdetails();
        $dish->dd_portion=$portion;
        $dish->dd_offerprice=$offers[$index];
        $dish->dd_price=$prices[$index];
        $dish->dd_status=$statusarray[$index];
        $dish->dm_id=$master->dm_id;
        $dish->save();
       }
        

        return redirect('/dish');
    }


    // update action
    public function updatecategory(Request $request)
    {

         $request->validate([
            'catName'      => 'required',
             'order'       => "required|unique:categorys,ct_order,{$request->post('id')},ct_id",
             
             'status'        => 'required',
        ]);


        $id=$request->post('id');
        if($id){
        $cat=categorys::find($id);}
        else{
        $cat=new categorys();     
        }
        $cat->ct_name=$request->post('catName');
        $cat->ct_order=$request->post('order');
        $cat->ct_status=$request->post('status');
        $cat->save();
        //return redirect()->back()->with('success','successfully added');
        return response()->json(['success'=>'Successfully']);
    
    }

     //update deliveryboy
    
    public function updatedeliveryboy(Request $request)
    {
        request()->validate([
            'delname' => "required",
             'mobile' => "required|unique:deliveryboys,dl_mob,{$request->post('id')},dl_id",
             'status' => 'required',
         ]);
        $id=$request->post('id');
        if($id){
            $del=deliveryboys::find($id);}
            else{
                $del=new deliveryboys();
            }
        
        $del->dl_name=$request->post('delname');
        $del->dl_mob=$request->post('mobile');
        $del->dl_status=$request->post('status');
        $del->save();
        return redirect()->back()->with('success','successfully added');
    }

    //update coupon

    public function updatecoupon(Request $request)
    {
        request()->validate([
            'cpncode' => "required|unique:coupons,cp_code,{$request->post('id')},cp_id",
             'cpnvalue' => 'required',
             'cpncart' => 'required',
             'cpnexpire' => 'required',
             'cpnstatus' => 'required',
         ]);
        $id=$request->post('id');
        if($id){
         $cpn=coupons::find($id);}
         else{
                $cpn=new coupons();

         }
        
        $cpn->cp_code=$request->post('cpncode');
        $cpn->cp_value=$request->post('cpnvalue');
        $cpn->cp_cartmin=$request->post('cpncart');
        $cpn->cp_expiry=$request->post('cpnexpire');
        $cpn->cp_status=$request->post('cpnstatus');
        $cpn->save();
        return redirect()->back()->with('success','successfully added');
    }

    //update location

     public function updatelocation(Request $request)
    {
        request()->validate([
             'locname' => 'required',
             'locdelcharge' => 'required',
             'locstatus' => 'required',
         ]);
        $id=$request->post('id');
        if($id){
        $loc=locations::find($id);}
        else{
            $loc=new locations();
        }
        $loc->lo_name=$request->post('locname');
        $loc->lo_deliverycharge=$request->post('locdelcharge');
        $loc->lo_status=$request->post('locstatus');
        $loc->save();
        return redirect()->back()->with('success','successfully added');
    }

     public function updateadmin(Request $request)
    {
        //request()->validate([
            //'del' => "required",
             //'mob' => 'required|min:10|max:10|unique:deliveryboys,dl_mob']);
        $id=$request->post('id');
        if($id){
            $admin=admins::find($id);}
            else{
                $admin=new admins();
            }
        
        $admin->ad_uname=$request->post('username');
        $admin->ad_pwd=$request->post('password');
        $admin->ad_email=$request->post('email');
        $admin->ad_status=$request->post('status');
        $admin->save();
        return redirect()->back()->with('success','successfully added');
    }

    //update dish
    public function editdish($dmid)
    {
        $master=dishmasters::find($dmid);
        // dd($master);
        $detail=dishdetails::where('dm_id','=',$dmid)->get();
        //dd($detail);
        // print_r($detail);
        return view("Admin.editdish",compact('master','detail')); 
    }

    public function updatedish(Request $request)
    {
        $id=$request->post('id');
        //dd($id);
        // dd($request->input('ct_id'));
        $master=dishmasters::find($id);
        $master->ct_id=$request->input('ct_id');
        $master->dm_name=$request->input('dish');
        $master->dm_description=$request->input('description');
        $master->dm_type=$request->input('type');
        $master->dm_status=$request->input('dish_status');
        if($request->hasfile('dishimage'))
        {
            $destination ='uploads/dishimage'.$master->dm_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            } 
            $file=$request->file('dishimage');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/dishimage',$filename);
            $master->dm_image=$filename;
        }
        $master->save();

       $portions= $request->input('portion');
       // dd($portions);
       $offers= $request->input('offer');
       $prices= $request->input('price');
       $statusarray= $request->input('portion_status');
       foreach($portions as $index=>$portion)
       {
        // dd($portion);
        $id=$request->post('did');
        //dd($request->input('portion_status'));
         //dd($id);
        //$dish=dishdetails::find($id);
        // dd($dish);
        $dish->dd_portion=$portion;
        $dish->dd_offerprice=$offers[$index];
        $dish->dd_price=$prices[$index];
        $dish->dd_status=$statusarray[$index];
        $dish->dm_id=$master->dm_id;
        $dish->save();
        // dd($index);
       }

    }

    // delete
    public function categorydelete($ct_id)
    {
    
        $data=categorys::find($ct_id);
        $data->delete();
        return redirect()->back()->with('message','Category details Deleted');
    }

    public function deliveryboydelete($dl_id)
    {
        $delivery=deliveryboys::find($dl_id);
        $delivery->delete();
        return redirect()->back()->with('message','deliveryboy details Deleted');;
    }
    
     public function coupondelete($cp_id)
    {
        $coupon=coupons::find($cp_id);
        $coupon->delete();
        return redirect()->back()->with('message','coupon details Deleted');;
    }

    public function locationdelete($lo_id)
    {
        $location=locations::find($lo_id);
        $location->delete();
        return redirect()->back()->with('message','location details Deleted');;
    }

    public function dishdelete($dm_id)
    {
        $dishmaster=dishmasters::find($dm_id);
        
        $dishmaster->delete();
        return redirect('/dish');
    }

    protected function authenticated()
    {
        if(auth::admins()->ad_status == '1'){
         return redirect('/category')->with('status','welcome admin');
        }   
        elseif(auth::admins()->ad_status == '0')
        {
        return redirect('/admin')->with('status','');
        }

    }
    
}





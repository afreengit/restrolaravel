<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorys;
use App\Models\deliveryboys;
use App\Models\coupons;
use App\Models\locations;

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
        $delivery->dl_name=$request->input('del');
        $delivery->dl_mob=$request->input('mob');
        $delivery->dl_status=$request->input('status');
        $delivery->save();
        return redirect('/deliveryboy');
    }

     public function addcouponaction(Request $request)
    {
        $delivery=new coupons();
        $delivery->cp_code=$request->input('code');
        $delivery->cp_value=$request->input('cart');
        $delivery->cp_cartmin=$request->input('value');
        $delivery->cp_expiry=$request->input('expire');
        $delivery->cp_status=$request->input('status');
        $delivery->save();
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

    // edit action
    public function editcategory($ct_id)
    { 
        $data=categorys::where('ct_id','=',$ct_id)->first();
        return view('Admin.categoryedit',compact('data'));
    }

    public function editdeliveryboy($dl_id)
    {
        $delivery=deliveryboys::find($dl_id);
    }

    // update action
    public function updatecategory(Request $request)
    {

        $id=$request->input('ct_id');
        $data=categorys::where('ct_id','=',$id)->first();
        //$data->ct_name=$request->name;
        dd($data);
    }

    // delete action
    public function categorydelete($ct_id)
    {
    
        $data=categorys::where('ct_id','=',$ct_id)->first();
        return view('Admin.category',compact('data'));

        $data->delete();
        return redirect('/category');
    }
}

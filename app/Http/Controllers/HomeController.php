<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\users;
use App\Models\categorys;
use App\Models\dishmasters;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $category=categorys::all();
        return view('homepage',['category'=>$category]);
    }

    public function registeraction(Request $request)
    {
        $u=new users();
        $u->u_name=$request->post("name");
        $u->u_email=$request->post("email");
        $u->u_password=md5($request->post("password"));
        $u->u_phone=$request->post("phone");
        $u->save();
        return back()->with("success","registration success");  
    }

    public function loginaction(Request $request)
    {
        $em=$request->post("email");
        $pwd=$request->post("password");
        $result=DB::table('users')
              ->where('u_email',$em)
              ->where('u_password',$pwd)
              ->first();
        if ($result) 
             {
               Session::put('customer_id',$result->u_id);
               return Redirect::to('/');
             }
        else {
             return back()->withErrors(['invalid credentials, cant sign in']);
             }
    }

    public function viewproducts($ctid)
    {
        $category=categorys::all();
        $presentcategoryname=categorys::where('ct_id',$ctid)->first();
        // $dish=dishmasters::where('ct_id',$presentcategoryname->ct_id)->where('dm_status',0)->get();
        $dish=dishmasters::where('ct_id',$ctid)->where('dm_status',1)->get();
        return view('productbycategory',compact('category','presentcategoryname','dish'));
    }

}
?>
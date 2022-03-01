<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\customers;
use Session;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    //
    public function registeraction(Request $request)
    {
        $name=$request->post("name");
        $email=$request->post("email");
        $pwd=$request->post("password");
        $phone=$request->post("phone");

        $r=new customers();
        $r->u_name=$name;
        $r->u_email=$email;
        $r->u_password=$pwd;
        $r->u_phone=$phone;
        
        $r->save();

        return back()->with("success","registration success");  

    }

    public function loginaction(Request $request)
    {
        $em=$request->post("email");
        $pwd=$request->post("password");
      
        $result=DB::table('users')
              ->where('u_email',$em)
              ->where('u_pwd',$pwd)
              ->first();

        if ($result) 
             {
               
               Session::put('customer_id',$result->u_id);
               return Redirect::to('/homepage');
             }
        else {
                
                return Redirect::to('/loginregister');
             }
    }
}
?>
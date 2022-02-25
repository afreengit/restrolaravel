<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function registeraction(Request $request)
    {
        $name=$request->post("name");
        $em=$request->post("email");
        $pwd=$request->post("password");
        $ph=$request->post("phone");

        $obj=new register();
        $obj->u_name=$name;
        $obj->u_email=$em;
        $obj->u_pwd=$pwd;
        $obj->u_phone=$ph;
        $obj->save();
        return back()->with("success","registration success!!");

    }

    public function loginaction(Request $request)
    {
        $em=$request->post("email");
        $pwd=$request->post("password");
    }
}
?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dishcarts;
use App\Models\dishmasters;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public function add_to_cart(Request $request,$dmid)
    // { 
    //     // $a=$request->qty;
    //     // dd($a);
    //     if(Auth::id())
    //     {

    //         $user=auth()->user();
    //         $cart=new dishcarts();
    //         $cart->u_id=$user->u_id;
    //         $cart->dd_id=$dmid;
    //         $cart->qty=$request->post("qty");
    //         $cart->save();
    //         return redirect()->back();
    //     }
    //     else 
    //     {
    //         return redirect('login');
    //     }
    // }
    public function add_to_cart(Request $request)
    { 
        $product_id=$request->input('dmid');
        $product_qty=$request->input('qty');
        if(Auth::check())
        {
            $userid=Auth::id();
            //checking if product exists
            $prod_check=dishmasters::where('dm_id',$product_id)->first();
            if ($prod_check)
            {
                //checking if product was already added
                if(dishcarts::where('dd_id',$product_id)->where('u_id',$userid)->exists())
                {
                    return response()->json(['status' => $prod_check->dm_name." already added"]);
                }
                else
                {
                    //adding selected products to cart
                    $cart= new dishcarts();
                    // $cart->u_id=Auth::id();this way is not possible
                    $cart->u_id=$userid; 
                    $cart->dd_id=$product_id;
                    $cart->qty=$product_qty;
                    $cart->save();
                    return response()->json(['status' => $prod_check->dm_name." added to cart successfully"]);
                }
            }
        }
        else
        {
            return response()->json(['status'=>"Login to continue shopping"]);
        }
    }

    public function show_cart(Request $request)
    {
    $cartitems = dishcarts::where('u_id',Auth::id())->get();
    // dd($cartitems);
    return view('/cart',compact('cartitems'));
    }
}

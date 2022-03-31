<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dishcarts;
use App\Models\dishmasters;
use Illuminate\Support\Facades\Auth;
use DB;

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
    // use jqueryajax:
    public function add_to_cart(Request $request)
    { 
        $product_id=$request->input('dmid');
        $product_qty=$request->input('qty');
        $productdetail_id=$request->input('ddid');
       
        if(Auth::check())
            {
                $userid=Auth::id();
                //checking if product exists
                $prod_check=dishmasters::where('dm_id',$product_id)->first();
                if ($prod_check)
                    {
                        //checking if product was already added
                        if(dishcarts::where('dd_id',$productdetail_id)->where('u_id',$userid)->exists())
                            {
                                return response()->json(['status' => $prod_check->dm_name." already added"]);
                            }
                        else
                            {
                                //adding selected products to cart
                                $cart= new dishcarts();
                                // $cart->u_id=Auth::id();this way is not possible
                                $cart->u_id=$userid; 
                                $cart->dd_id=$productdetail_id;
                                $cart->qty=$product_qty;
                                $cart->save();
                                return response()->json(['status' => $prod_check->dm_name." added to cart successfully"]);
                            }
                    }
                // else
                // {
                //     abort(404);
                // }
            }
        else
            {
                return response()->json(['status'=>"Login to continue shopping"]);
            }
    }

    public function show_cart(Request $request)
    {
    // $cartitems = dishcarts::where('u_id',Auth::id())->get();
    // dd($cartitems);

    // $userid=Auth::id();
    // $cartitems=DB::table('dishcarts')
    // ->join('dishdetails','dishcarts.dd_id','=','dishdetails.dd_id')
    // ->where('dishcarts.u_id',$userid)
    // ->select('dishdetails.*');
    // dd($cartitems);
    $cartitems = dishcarts::with('products','dmname')->where('u_id',Auth::id())->get();
    //dd($cartitems);

    return view('/cart',compact('cartitems'));
    // return view('/cart',['cartitems'=>$cartitems]);
    }

    public function delete_from_cart(Request $request)
    {
        $cart_id=$request->input('cart_id');
        if(Auth::check())
            {
                $userid=Auth::id();
                if(dishcarts::where('dc_id',$cart_id)->where('u_id',$userid)->exists())
                {
                    $cartitem=dishcarts::where('dc_id',$cart_id)->where('u_id',$userid)->first();
                    $cartitem->delete();
                    return response()->json(['status'=>"Product deleted!!!"]);
                }
                else
                {
                    return response()->json(['status'=>"No such product in cart"]);
                }
                
            }
        else
            {
                return response()->json(['status'=>"Login to continue shopping"]);
            }
    }

    public function update_cart(Request $request)
    {
        $prod_id=$request->input('prod_id');
        $product_qty=$request->input('prod_qty');
        // dd($product_qty);
        if(Auth::check())
            {
                $userid=Auth::id();
                if(dishcarts::where('dd_id',$prod_id)->where('u_id',$userid)->exists())
                {
                    $cartitem=dishcarts::where('dd_id',$prod_id)->where('u_id',$userid)->first();
                    
                    $cartitem->qty=$product_qty;
                    $cartitem->update();

                    return response()->json(['status'=>"Quantity updated!!!"]);
                }
                else
                {
                    return response()->json(['status'=>"No such product in cart"]);
                }
                
            }
        else
            {
                return response()->json(['status'=>"Login to continue shopping"]);
            }
    }
    // public function update_cart(Request $request)
    // {
    // $prod_id=$request->input('prod_id');
    // $product_qty=$request->input('prod_qty');                 
    // if(Auth::check())
    //     {
    //        if(dishcarts::where("dd_id",$prod_id)->where("u_id",Auth::id())->exists())
    //        {
    //            $cart=dishcarts::where("dd_id",$prod_id)->where("u_id",Auth::id())->first();
    //            $cart->qty=$product_qty;
    //            $cart->update();
    //            return response()->json(['status'=>"Quantity updated"]);
    //         }
    //     }
    // }
}//end of cartcontroller
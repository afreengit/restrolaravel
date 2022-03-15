<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\users;
use App\Models\categorys;
use App\Models\dishmasters;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $category=categorys::all();
        return view('homepage',['category'=>$category]);
    }

    // public function userhome()
    // {
    //     $category=categorys::all();
    //     return view('userhome',['category'=>$category]);
    // }

    public function registeraction(Request $request)
    {
        // var_dump(request()->all());
        $attributes=request()->validate([
        'u_name'=>'required|max:255',
        'u_email'=>'required|email|max:255|unique:users,u_email',
        // 'u_email'=>['required','email','max:255',Rule::unique('users','u_email')], can also be written
        'u_password'=>'required|min:8|max:255',
        'u_phone'=>'required|max:11'
        ]);
        // dd('validation succeeded');
        $attributes['u_password']=bcrypt($attributes['u_password']);
        users::create($attributes);
        session()->flash('success','Your account is registered!');
        return redirect('/login');
    }


    public function loginaction(Request $request)
    {
        $attributes=request()->validate([
        'u_email'=>'required|email',
        'u_password'=>'required',
        ]);
        if(auth()->attempt($attributes)) {
            return redirect('/')->with('success','Welcome back!');
        }
        return back()
        ->withErrors(['email'=>'Your provided credentials could not be verified!'])
        ->withInput();

        // similar method:
        // throw ValidationException::withMessages([
        //      'email'=>'Your provided email could not be verified!' 
        // ]);
    }


    public function logout()
    {
        // similarly
        // auth()->logout();
        Auth::logout();
        Session::flush();
        return redirect('/');
    }


    public function viewproducts($ctid)
    {
        // $category=categorys::all();
        $category=categorys::paginate(3);
        $presentcategoryname=categorys::where('ct_id',$ctid)->first()->value('ct_name');
        // $dish=dishmasters::where('ct_id',$presentcategoryname->ct_id)->where('dm_status',0)->get();
        $dish=dishmasters::where('ct_id',$ctid)->where('dm_status',1)->get();
        return view('products',compact('category','presentcategoryname','dish'));
    }


    // public function profile()
    // {
    //     $userdetails=users::find(Auth::id()); //do not use first() with find
    //     return view('displayprofile',compact('userdetails'));
    // }
    public function updateprofile(Request $request)
    {
        // return $request->all();
        // var_dump(request()->all());
        $attributes=request()->validate([
        'u_name'=>'required|max:255',
        'u_phone'=>'required|max:11',
        'u_email'=>'required|email|max:255',
        'u_home_address'=>'max:1000',
        'u_office_address'=>'max:1000',
        ]);
        // dd('validation succeeded');
        $user_id=Auth::id();
        users::findorFail($user_id)->update($attributes);
        session()->flash('success','Your profile is updated!');
        return redirect('/displayprofile');
        // dd($attributes);
        // dd('validation succeeded');
        // users::save($attributes);
        // $user= new users(); this is wrong in this case
        // $user_id=Auth::id();
        // $user=users::findorFail($user_id);
        // dd($user);
        // $user->u_name=$request->u_name;
        // $user->u_password=$request->u_password;
        // $user->u_email=$request->u_email;
        // $user->u_phone=$request->u_phone;
        // $user->u_home_address=$request->u_home_address;
        // $user->u_office_address=$request->u_office_address;
        
        // $user->update();
    
      
        
    }
}
?>
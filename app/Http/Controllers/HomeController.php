<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\users;
use App\Models\categorys;
use App\Models\dishmasters;
use App\Models\dishdetails;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use DB;
use Session;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        // $category=categorys::all();
        // return view('homepage',['category'=>$category]);
        // the above way is not suitable since this has to be called in products page also, so better to do in blade

        return view('homepage');
    }

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

     public function updateprofile(Request $request)
    {
        // return $request->all();
        // var_dump(request()->all());
        $user_id=Auth::id();
        $attributes=request()->validate([
        'u_name'=>'required|max:255',
        'u_phone'=>'required|max:11',
        // 'u_email'=>"required|email|max:255|unique:users,u_email,{$request->post('u_id')},u_id",
        'u_email'=>"required|email|max:255|unique:users,u_email,$user_id,u_id",
        'u_home_address'=>'max:1000',
        'u_office_address'=>'max:1000',
        ]);
        // dd('validation succeeded');
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

    public function changepasswordaction(Request $request)
    {
        $request->validate([
        'old_password' => 'required',
        'new_password' => 'required',
        'confirm_password' => 'required|same:new_password'
        ]);
       
        $current_user=auth()->user();
        if(Hash::check($request->old_password,$current_user->u_password))
        {
            $current_user->update([
                'u_password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('message','Password changed successfully!!');
        }
        else
        {
            return redirect()->back()->with('message','Old password is not entered correctly,please try again');
        }
    }

    public function viewproducts($ctname,$ctid)
    {
        $dish=dishmasters::with('dishdetail')->where('ct_id',$ctid)->where('dm_status',1)->get();
        return view('products',compact('ctid','dish'));
    }
   
}
?>
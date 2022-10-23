<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomAuthController extends Controller
{
   public function login(){
    return view('auth.login');
   }

   public function loginUser(Request $request){
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:5|max:12',
    ]);

    $user = User::where('email', '=', $request->email)->first();
    if($user){
        if (hash::check($request->password, $user->password) && $user->usertype == '0') {
            $request->session()->put('loginId', $user->id);
            return redirect('/');
        }elseif(hash::check($request->password, $user->password) && $user->usertype == '1') {
            $request->session()->put('loginId', $user->id);
            return redirect('/adminparnel');
        }else{
            return back()->with('fail', 'Password or Email not matches.');
            
        }
    }else{
        return back()->with('fail', 'This email is not registered');
    }
   }


   public function adminregistration(){
        return view('auth.admin-register');
   }
   public function registration(){
    return view('auth.register');
   }
   public function registerAdmin(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'phone'=>'required',
        'usertype'=>'required',
        'password'=>'required|min:5|max:12',
    ]);


    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->usertype = $request->usertype;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password);
    $res = $user->save();
    if($res){
        return back()->with('success', 'YOu have registered successfully');
    }
    else{
        return back()->with('fail', 'not successfully');

    }
   }
   public function registerUser(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'phone'=>'required',
        'password'=>'required|min:5|max:12',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password);
    $res = $user->save();
    if($res){
        return back()->with('success', 'YOu have registered successfully');
    }
    else{
        return back()->with('fail', 'not successfully');

    }
   }

    public function admin(){
        $category = Category::all();
        $product= Product::all();
        return view('admin.index', compact('product', 'category'));
    }

   public function dashboard(){
    $product = Product::all();
    $cart = Cart::all();
    return view('customer.index2', compact('product', 'cart'));
   }

   public function logout(){
    if(Session::has('loginId')){
        Session::pull('loginId');
        return redirect('login');
    }
   }
}
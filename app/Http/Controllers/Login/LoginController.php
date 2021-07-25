<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Login\UsersRequest;


class LoginController extends Controller
{
    //Đăng Ký
    public function Create(REQUEST $request)
    {
        return view('Login.Sigup');
    }

    public function Creates(UsersRequest $request)
    {
        // dd($request->all());
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads/'),$file_name);
        }

        $request->merge(['image'=>$file_name]);
        // dd($request);
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->file,
            'password'=>Hash::make($request->password)
        ]);

        if ($User) {
            return redirect() -> route('Signin')->with('success','Đăng Ký Thành Công!');
        }else{
            return redirect() -> route('SignUp')->with('success','Đăng Ký Thất Bại!');
        }
    }

     //Đăng Nhập
     public function Signin(REQUEST $request)
     {
        $Page = $request->Page;
        // dd($request->all());
        // return view('Login',compact('Page'));
        return view('Login.Login',compact('Page'));
     }
 
    public function postSignin(REQUEST $request){
         // $aaa = User::all();
        // dd($request->all());
        if (Auth::attempt($request->only('email','password'))) {
            if ($request->Page == 'check_out') {
                return redirect() -> route('Cart.checkOut');
            }else{
                return redirect() -> route('Homes');
            }
        }else{
            return redirect() -> route('Signin')->with('success','Đăng Nhập thất bại!');
        };
    }
 
     //Đăng Xuất
     public function logout(){
        Auth::logout();
        return redirect() -> route('Homes');
     }
}

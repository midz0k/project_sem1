<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Login(){
        return view('Login.AdminLogin');
    }

    public function postLogin(Request $request){
        // dd($request);
        if (Auth::attempt($request->only('email','password'))) {
            // echo"Đăng nhập thành công";
            return redirect() -> route('Home');
        }else{
            return redirect() -> route('AdminLogin')->with('success','Đăng Nhập Thất Bại');
        };
    }
    
    public function logout(){
        Auth::logout();
        return redirect() -> route('AdminLogin');
    }
}

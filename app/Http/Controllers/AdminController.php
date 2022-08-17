<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AdminController extends Controller
{

    public function login()
    {
        return view('Admin.login');
    }

    function regester(){
        return view('admin.register');
    }


    public function checkLoginData(Request $request)
    {
        $check =$request->all();
        if(Auth::guard('admin')->attempt([
            'email'=>$check['email'],
            'password'=>$check['password'] ])){
                 return redirect()->route('dashboard');
                                              }
        else {return redirect()->route('login_form')->with('error','Email or password Error!');}
    }


    public function dashboard(){
       $adminData= Auth::guard('admin')->user();
        return view('admin.index',compact('adminData'));
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return view('Admin.login');
    }



    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins'  ]);
            if ($validator->fails()) {return redirect()->route('regester_form')->with('error','Email is used!');}
            $validator = Validator::make($request->all(), [
                'name' => ['required'],
                'password' => 'required|confirmed'  ]);
                if ($validator->fails()) {return redirect()->route('regester_form')->with('error','The password confirmation does not match.');}


        else
        {
        $user=Admin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        $check =$request->all();
        if(Auth::guard('admin')->attempt([
            'email'=>$check['email'],
            'password'=>$check['password'] ])){
                 return redirect()->route('dashboard');
        }}

    }

}

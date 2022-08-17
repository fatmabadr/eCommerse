<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;


use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class indexController extends Controller
{
    public function login(){
        return view('user.login');
    }


    public function checkLoginData(Request $request){
        if(Auth::guard('web')->attempt([
            'email'=>$request['email'],
            'password'=>$request['password'] ])){
                 return  redirect()->route('home')->with('succ','logins uccessfuly');}
                 else        return  redirect()->route('user.login')->with('error','Email or password Error');

    }
 /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users'  ]);
            if ($validator->fails()) {
                return  redirect()->route('user.login')->with('error','Email is used!');
            }
            $validator = Validator::make($request->all(), [
                'name' => ['required'],
                'password' => 'required|confirmed'  ]);
                if ($validator->fails()) {return  redirect()->route('user.login')->with('error','The password confirmation does not match.');}


        else
        {
        $user=User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        if(Auth::guard('web')->attempt([
            'email'=>$request['email'],
            'password'=>$request['password'] ])){
                 return  redirect()->route('home');

            }
    }
}


public function logout(){
    Auth::guard('web')->logout();
    return redirect()->route('home')->with('succ','logout successfully ');
}
public function resetpassword(){
    return view('user.resetPassword');
}
public function passwordResetLink(Request $request){

    $request->validate([
        'email' => ['required', 'email'],
    ]);
    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status == Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
}



public function profile(){
    return view('user.profile');
}
public function updatProfile(){
    return view('user.updatProfile');
}
public function  save_edites_Profile(Request $request){

    $user = User::find(Auth::user()->id);
    $user->name=$request->name;
    $user->email=$request->email;

    if($request->file('photoDirectory')){
        @unlink('frontend/users/profileImages/'.$user->photoDirectory);
        $image=$request->file('photoDirectory');
        $fileName=date('YmdHp').$image->getClientOriginalName();
        $user->photoDirectory=$fileName;
        $image->move('frontend/users/profileImages',$fileName);
                                        }


    $user->save();
    return redirect()->route('user.profile')->with('succ','profile updated successfully');


                                                    }
public function deleteImage(){

  $user=User::find(Auth::user()->id);
  @unlink('frontend/users/profileImages/'. $user->photoDirectory);
  $user->photoDirectory='';
  $user->save();
  return redirect()->route('user.update.profile')->with('succ','image deleted successfully');
}

public function changepassword(){
    return view('user.changepassword');
}
//end changepassword function


public function check_and_save_newpassword(Request $request){

    $validator = Validator::make($request->all(),[
        'new_password'=>'required| min:8']);
        if ($validator->fails()) {
            return redirect()->route('user.change.password')->with('error','password mush be at least 8');}

    $validator = Validator::make($request->all(),[
         'new_password'=>'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']);
         if ($validator->fails()) {
            return redirect()->route('user.change.password')->with('error','password must have one symbol from (! ,# $or %)');}

    $validator = Validator::make($request->all(),[
        'confirm_new_password'=>'required |same:new_password']);



    if ($validator->fails()) {
        return redirect()->route('user.change.password')->with('error','psswords not equal');}

    $hashedpassword=Auth::user()->password;
    if(Hash::check($request->oldPassword, $hashedpassword)){

        $user=User::find(Auth::user()->id);
        $user->password=bcrypt($request->new_password);
        $user->save();
        Auth::guard('web')->logout();
        return  redirect()->route('user.login')->with('succ','password changed successfully');}
    else{return redirect()->route('user.change.password')->with('error','old password error');}


}

}

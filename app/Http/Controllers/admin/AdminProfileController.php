<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{


    public function profileData(){
$adminData= Auth::guard('admin')->user();
//$adminData=Admin::find($adminId);
        return view('admin.admin_profile',compact('adminData'));
    }


    public function editeProfile(){
$adminData=Auth::guard('admin')->user();
        return view('Admin.editeProfile',compact('adminData'));
    }



    public function save_edites_Profile(Request $req){
        $adminData = Admin::find(Auth::guard('admin')->user()->id);
        $adminData->name=$req->input('name');
        $adminData->email=$req->input('email');
        if($req->file('photoDirectory')){
            @unlink('backend/admin/profileImages/'.$adminData->photoDirectory);
            $image = $req->file('photoDirectory');
            $filename=date('YmdHp').$image->getClientOriginalName().'jpg';
            $image->move('backend/admin/profileImages',$filename);
            $adminData->photoDirectory=$filename;
        }
        $adminData->save();
        return view('Admin.admin_profile',compact('adminData'));
    }



    public function deleteImage(){
        $adminData=Admin::find(Auth::guard('admin')->user()->id);
        if(File::exists('backend/admin/profileImages/'.$adminData->photoDirectory)) {
            @unlink('backend/admin/profileImages/'.$adminData->photoDirectory);
          //  File::delete('backend/admin/profileImages/'.$adminData->photoDirectory);
        }

        $adminData->photoDirectory='';
        $adminData->save();


        return redirect()->route('admin.profile.edite')->with('succ','image deleted successfully');
    }



    public function changepassword(){
        return view('admin.changepassword');
    }



    public function check_and_save_newpassword(Request $request){


        $validator = Validator::make($request->all(), [
         'old_password'=>'required',
         'new_password'=>'required',
         'confirm_new_password'=>'required |same:new_password'

     ]);


     if ($validator->fails()) {
        return view('admin.changepassword')->withErrors($validator);
    }

 $hashedPassword=Auth::guard('admin')->user()->password;
 if(Hash::check($request->old_password,$hashedPassword)){
    $admin= Admin::find(Auth::guard('admin')->user()->id);
    $admin->password=bcrypt($request->new_password);
    $admin->save();
    Auth::guard('admin')->logout();
    return redirect()->route('login_form')->with('error','passwrd changed successfully');
 }
       else  return redirect()->route('admin.changepassword')->with('error','old password erreo');
}
}

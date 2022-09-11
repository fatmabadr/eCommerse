<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class brandController extends Controller
{
    public function brandsView(){
            $brands=Brand::latest()->get();
            return view('admin.brandsView',compact('brands'));
    }
//end of function

public function brandDelete($id){

    $brand = Brand::findorfail($id);
    @unlink('backend/admin/brandImages/'.$brand->image);
    $brand->delete();
    return redirect()->route('brands.view')->with('succ',"brand Deleted Successfully");
                                }

public function brandEdit($id){
    $brand=Brand::findorfail($id);
    return view('admin.brand.brandEdit',compact('brand'));


}

public function brandSave(Request $request){

if ($request->file('BarandImage')){

$fileName=date('YmdHp').$request->file('BarandImage')->getClientOriginalName();
//$request->file('BarandImage')->move('backend/admin/brandImages',$fileName);
Image::make($request->file('BarandImage'))->resize(100,50)->save('backend/admin/brandImages/'.$fileName);
}
else{$fileName='';}

Brand::create([
'name_english'=>$request->name_english,
'slag_english'=>strtolower($request->name_english),
'name_arabic'=>$request->name_arabic,
'slag_arabic'=>$request->name_arabic,
'image'=>$fileName

]);
return redirect()->route('brands.view');


}
//end of function

public function brandUpdat(Request $request){
    $brand=Brand::findorfail($request->id);
    $brand->name_english=$request->name_english;
    $brand->name_arabic=$request->name_arabic;
    $brand->slag_english=strtolower($request->name_english);
    $brand->slag_arabic=$request->name_arabic;


    if($request->file('image')){
        @unlink('backend/admin/brandImages/'.$brand->image);
        $filename=date('YmdHp').$request->file('image')->getClientOriginalName();
        Image::make($request->file('image'))->resize(100,50)->save('backend/admin/brandImages/'.$filename);
        $brand->image = $filename;
    }

    $brand->save();
    return redirect()->route('brands.view')->with('succ','brand Updated Successfully');
}

}

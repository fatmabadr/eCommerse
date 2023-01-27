<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function manageSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.slider_view',compact('sliders'));
    }
    //end of function
    public function saveSlider(Request $request){

            $filename=hexdec(uniqid()).'.'.$request->file('slideImage')->getClientOriginalExtension();
            Image::make($request->file('slideImage'))->resize(870,370)->save('backend/admin/slider/'.$filename);
        Slider::insert([
            'title' =>$request->title,
            'description'=>$request->description,
            'slider_img'=>$filename
        ]);
        return redirect()->back();

    }
    //end of function
    public function editSlider($id){
       $slider=Slider::find($id);
       return view('Admin.slider.slider_edite',compact('slider'));
    }
    //end of function

    public function updateSlider(Request $request){
    $slider=Slider::findorfail($request->id);
    $slider->title=$request->title;
    $slider->description=$request->description;
  if($request->file('slideImage')) {
    $filename=hexdec(uniqid()).'.'.$request->file('slideImage')->getClientOriginalExtension();
    @unlink('backend/admin/slider'.$slider->slider_img);
    Image::make($request->file('slideImage'))->resize(870,370)->save('backend/admin/slider/'.$filename);
    $slider->slider_img =$filename;
  }

    $slider->save();
        return redirect()->route('slider.mange')->with('succ','slider updated successfully!');
    }
    //end of function

    public function deleteSlider($id){
        Slider::destroy($id);
        return redirect()->route('slider.mange')->with('succ','slider deleted successfully!');
    }
    //end of function

}

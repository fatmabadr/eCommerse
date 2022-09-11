<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Catgory;
use App\Models\Subsubcategory;

class SubsubCagegoryController extends Controller
{
    public function subsubCategoriesView(){
        $allCategories = Catgory::orderby('name_english','ASC')->get();
        $subcategory = Subcategory::orderby('name_english','ASC')->get();
        $allsubsubCategory = Subsubcategory::latest()->get();
        return view('Admin.category.subsubcategoriesView',compact('allCategories','subcategory','allsubsubCategory'));

    }
    //end of function

    public function subsubCategorySave(Request $request){
        Subsubcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'name_english'  =>$request->subsubcategory_name_en,
            'name_arabic'  =>$request->subsubcategory_name_arabic,
            'slag_english'  =>$request->subsubcategory_name_en,
            'slag_arabic'  =>$request->subsubcategory_name_arabic
        ]);
        return redirect()->route('sub->subCategories.view')->with('succ','sub->sub category added successfully!');
    }
    //end of function

    public function subsubCategorDelete($id){
        Subsubcategory::findorfail($id)->delete();
        return redirect()->route('sub->subCategories.view')->with('succ','sub->sub category deleted successfully');
    }
    //end of function

    public function subsubCategorEdit($id){
        $subsubcategory=Subsubcategory::findorfail($id);
        $allCategories= Catgory::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('Admin.category/subsubCategoryEdit',compact('subsubcategory','allCategories','subcategories'));
    }
     //end of function
    public function subsubCategorUpdat(Request $request){
        $subsubCategory=Subsubcategory::findorfail($request->id);
        $subsubCategory->category_id=$request->category_id;
        $subsubCategory->subcategory_id=$request->subcategory_id;
        $subsubCategory->name_english=$request->name_english;
        $subsubCategory->name_arabic=$request->name_arabic;
        $subsubCategory->slag_english=$request->name_english ;
        $subsubCategory->slag_arabic=$request->name_arabic;
        $subsubCategory->save();

        return redirect()->route('sub->subCategories.view')->with('succ','sub->sub category deleted successfully');
    }
     //end of function
     public function GetsubSubCategory($subcategory_id){
         $subsubCategories=Subsubcategory::where('subcategory_id',$subcategory_id)->orderby('name_english','ASC')->get();
         return json_decode($subsubCategories);

     }



}

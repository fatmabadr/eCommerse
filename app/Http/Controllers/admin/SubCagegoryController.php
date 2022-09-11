<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Catgory;


class SubCagegoryController extends Controller
{


    public function subCategoriesView(){
        $allCategories=Catgory::orderby('name_english','ASC')->get();
        $subCategrories=Subcategory::latest()->get();
        return view('Admin.category.subCategoriesView',compact('subCategrories','allCategories'));
}
//end of function

    public function subCategorySave(Request $request){

        Subcategory::create([
            'name_english'=>$request->name_english,
            'name_arabic'=>$request->name_arabic,
            'slag_english'=>$request->name_english,
            'slag_arabic'=>$request->name_arabic,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('subCategories.view')->with('succ','subCategory added successfully');
    }
//end of function

    public function subCategorDelete($id){
        Subcategory::findorfail($id)->delete();
        return redirect()->route('subCategories.view')->with('succ','subCategory deleted successfully');
    }
//end of function

    public function subCategorEdit($id){
        $allCategories=Catgory::orderby('name_english','ASC')->get();
        $subcategory = SubCategory::findorfail($id);
        return view('Admin.category.subCategoryEdit',compact('subcategory','allCategories'));
    }
//end of function
    public function subCategorUpdat(Request $request){
        $subCategory= Subcategory::find($request->id);
        $subCategory->category_id =$request->category_id;
        $subCategory->name_english =$request->name_english;
        $subCategory->name_arabic =$request->name_arabic;
        $subCategory->save();

        return redirect()->route('subCategories.view')->with('succ','subCategory updated successfully');
    }
    //end of function
    public function GetSubCategory ($category_id){
        $subCategrories = SubCategory::where('category_id',$category_id)->orderBy('name_english','ASC')->get();
        return json_encode($subCategrories);





}
}


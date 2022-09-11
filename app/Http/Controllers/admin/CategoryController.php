<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catgory;

class CategoryController extends Controller
{
    public function categoriesView(){
        $categories = Catgory::latest()->get();
        return view('admin.category.categoriesView',compact('categories'));
    }
    //end of function
    public function CategoryDelete($id){
        $catgory=Catgory::find($id);
        $catgory->delete();
        return redirect()->route('categories.view')->with('succ','category deleted successfully');
    }
    //end of function
    public function CategorySave(Request $request){
        Catgory::create([
            'name_english'=>$request->name_english,
            'name_arabic'=>$request->name_arabic,
            'slag_english'=>$request->name_english,
            'slag_arabic'=>$request->name_arabic,
            'icon'=>$request->icon
                        ]);
        return redirect()->route('categories.view')->with('succ','new categoy added successfully');

    }
    //end of function
    public function CategoryEdit($id){
        $category=Catgory::findorfail($id);
        return view('Admin.category.CategoryEdit',compact('category'));
    }
    //end of function
    public function CategoryUpdat(Request $request){
        $category=Catgory::find($request->id);
        $category->name_english=$request->name_english;
        $category->name_arabic=$request->name_arabic;
        $category->icon=$request->icon;
        $category->save();
        return redirect()->route('categories.view')->with('succ','category updated successfully');
    }
     //end of function
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Catgory;
use App\Models\Subsubcategory;
use App\Models\Product;
use App\Models\ProductImage;

class HomeController extends Controller

{
    public function getAllData(){
        $categories= Catgory::latest()->get();
        $featuredProducts= Product::where('featured','1')->get();

        return view('index',compact('categories','featuredProducts'));
    }

    public function productDetails($id){
       $product=Product::findorfail($id);
       $multiimages=ProductImage::where('product_id',$id)->get();
       $categories= Catgory::latest()->get();



       return view('productDetails',compact('product','categories','multiimages'));

    }


    public function TagProducts($tag){
		$products = Product::where('status',1)->where('tags_english',$tag)->orWhere('tags_arabic',$tag)->orderBy('id','DESC')->paginate(3);

        return view('user.tagesView',compact('products','tag'));
    }
    //end of function

    public function getSubCategoryProducts($name , $id){

        $products=Product::where('status',1)->where('subcategory_id',$id)->paginate(9);
        return view('user.allSubcategoryProducts',compact('products','name'));
    }
    //end of function


    public function getSubsubCategoryProducts($name , $id){

        $products=Product::where('status',1)->where('subsubcategory_id',$id)->orderBy('id','DESC')->paginate(12);
        return view('user.allSubcategoryProducts',compact('products','name'));
    }


    public function getproduct_json($id){



        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->color_english;
		$product_color = explode(',', $color);
		$size = $product->size_english;
		$product_size = explode(',', $size);


        return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
		));



    }
}

<?php

namespace App\Http\Controllers\admin;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use App\Models\Subcategory;
use App\Models\Catgory;
use App\Models\Product;
use App\Models\ProductImage;
class productController extends Controller
{
    //

    public function addNewProduct(){
        $allBrands= Brand::latest()->get();
        $allCategories=Catgory::latest()->get();
        $allsubcategory=Subcategory::latest()->get();

        return view('admin.product.addnew',compact('allBrands','allCategories','allsubcategory'));
    }
    //end of function

    public function saveNewProduct(Request $request){

        if ($request->file('product_thambnail')){

            $fileName=date('YmdHp').$request->file('product_thambnail')->getClientOriginalName();
            Image::make($request->file('product_thambnail'))->resize(917,1000)->save('backend/admin/ProductImages/'.$fileName);
            }
        else{$fileName='';}

       $product= Product::insertGetId([
            'category_id' => $request->category_id,
             'brand_id'=>$request->brand_id ,
             'subcategory_id'=>$request->subcategory_id,
             'subsubcategory_id'=>$request->subsubcategory_id,
             'name_english'=>$request->product_name_english,
             'name_arabic'=>$request->product_name_arabic,
             'slag_english'=>$request->product_name_english,
             'slag_arabic'=>$request->product_name_arabic,
             'code'=>$request->product_code,
             'quantity'=>$request->product_quantity ,
             'tags_english'=>$request->product_tags_en,
             'tags_arabic'=>$request->product_tags_arabic ,
             'size_english'=>$request->product_size_en ,
             'color_english'=>$request->product_color_en,
             'size_arabic'=>$request->product_size_arabic,
             'color_arabic'=>$request->product_color_arabic,
             'selling_price'=>$request->silling_price,
             'discount_price'=>$request->descount_price,
             'short_description_english'=>$request->short_descp_en,
             'short_description_arabic'=>$request->short_descp_arabic,
             'long_description_english'=>$request->long_descp_english,
             'long_description_arabic'=>$request->long_descp_arabic,
             'hotDeals'=>$request->hot_deal,
             'featured'=>$request->featured,
             'specialoffer'=>$request->specialoffer,
             'specialdeals'=>$request->specialdeals,
             'status'=>1,
             'created_at' => Carbon::now(),
             'product_thambnail'=>$fileName
        ]);

    if ($request->file('multi_img')){

       $images=$request->file('multi_img');

       foreach($images as $image){
            $fileName=date('YmdHp').$image->getClientOriginalName();
            Image::make($image)->resize(917,1000)->save('backend/admin/multi-image/'.$fileName);
            ProductImage::insert([
                'product_id'=>$product,
                'PhotoName'=>$fileName
            ]);
        }


		return redirect()->back()->with("succ",'Product Inserted Successfully');
    }}
    //end of function

    public function mangeProduct(){
        $products = Product::latest()->get();
        return view('Admin.Product.allProducts',compact('products'));
    }
    //end of function

    public function editProduct($id){
        $product= Product::find($id);
        $allBrands= Brand::latest()->get();
        $allCategories=Catgory::latest()->get();
        $allsubcategory=Subcategory::latest()->get();

        return view('admin.product.edit',compact('allBrands','allCategories','allsubcategory','product'));

    }
    //end of function
    public function updateProduct(Request $request){

       $product= Product::find($request->id);

        $product->category_id= $request->category_id;

       $product->brand_id=$request->brand_id ;

       $product->subcategory_id=$request->subcategory_id;

       $product->subsubcategory_id=$request->subsubcategory_id;
       $product->name_english=$request->product_name_english;
       $product->name_arabic=$request->product_name_arabic;
       $product->slag_english=$request->product_name_english;
       $product->slag_arabic=$request->product_name_arabic;
       $product->code=$request->product_code;
       $product->quantity=$request->product_quantity ;
       $product->tags_english=$request->product_tags_en;
       $product->tags_arabic=$request->product_tags_arabic ;
       $product->size_english=$request->product_size_en ;
       $product->color_english=$request->product_color_en;
       $product->size_arabic=$request->product_size_arabic;
         $product->color_arabic=$request->product_color_arabic;
         $product->selling_price=$request->silling_price;
         $product->discount_price=$request->descount_price;
         $product->short_description_english=$request->short_descp_en;
         $product->short_description_arabic=$request->short_descp_arabic;
         $product-> long_description_english=$request->long_descp_english;
         $product->long_description_arabic=$request->long_descp_arabic;
         $product->hotDeals=$request->hot_deal;
         $product->featured=$request->featured;
         $product->specialoffer=$request->specialoffer;
         $product->specialdeals=$request->specialdeals;
         $product->status=1;
         $product->created_at = Carbon::now();

$product->save();
        return  redirect()->route('products.mange')->with('succ','product updated successfully!');
    }
    //end of function
    public function deleteProduct($id){
        Product::destroy($id);
        return redirect()->route('products.mange')->with('succ','product deleted successfully!');
    }
    //end of function
}

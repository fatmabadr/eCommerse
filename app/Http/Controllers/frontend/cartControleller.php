<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;



class cartControleller extends Controller
{


    public function addToCart(Request $request,$product_id){

       $product=Product::findorfail($product_id);

        Cart::add([

           'id' =>$product_id ,
           'name' => $product->name_english ,
           'qty' => 1,
           'price' =>$product->discount_price,
           'weight' => 1,
           'options'=>[
           'size'=>$request->size,
           'color'=>$request->color,
          'image'=>$product->product_thambnail
        ],
 ]);


 return response()->json(['success'=>'added to cart successfully!']);

    }

    public function minicart(){
        $carts=Cart::content();
        $cartTotal= Cart::total();
        $cartcount=Cart::count();
        return response()->json(array('carts'=>$carts, 'cartTotal'=>$cartTotal, 'cartcount'=>round($cartcount)));

    }
    public function removeitem($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'product remove succesfully']);

    }
}

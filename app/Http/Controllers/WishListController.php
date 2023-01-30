<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\WishList;
use Illuminate\Http\Request;
use App\Models\Product;

class WishListController extends Controller
{
    public function addtowishlist(Request $request ,$product_id ){
      $exist=Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();

       if(Auth::check()){
        if(!$exist){
        Wishlist::insert([
            'user_id' => Auth::id(),
            'product_id'=>$product_id


        ]);}
        return response()->json(['success'=>'successfully added to wishlist']);

       }
       else{
        return response()->json(['error'=>'login first plz']);
      }
    }

    public function Getwishlist(){
        return view('user.wishlist');
    }


public function getWishListproducts(){
    $wishlist=WishList::with('product')->where('user_id',Auth::id())->latest()->get();
    return response()->json($wishlist);
}


public function removeProductFromwishList($id){

WishList::find($id)->delete();
return response()->json(['successfully removed from wish list ^_^']);
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductWish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function AddToWish(Request $request){
        
        $product_id = $request->input('product_id');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            
            if($prod_check)
            {
                if(ProductWish::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>"Already Added this product !"]);
                }else
                {

               
                        $cartItem =new ProductWish();
                        $cartItem->product_id = $product_id;
                        $cartItem->user_id = Auth::id();
                        $cartItem->save();
                        return response()->json(['status'=>$prod_check->title." Product Added To WishList !"]);
                    }
            }
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }
    public function WishList(){
        $data = ProductWish::where('user_id',Auth::id())->with('product')->get();
        return view('page.Frontend.wishList',compact('data'));
    }
    public function MiniWish(Request $request){
        $cartcount = ProductWish::where('user_id',Auth::id())->count();
        return response()->json(["counts"=>$cartcount]);
    }
    public function RemoveWish(Request $request){
        if(Auth::check())
        {
            $product_id=$request->input('product_id');

            if(ProductWish::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartItem = ProductWish::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"product Deleted successfully !"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Product Not Deleted !"]);
        }
    }
}

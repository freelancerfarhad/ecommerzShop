<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //ProductCart
    public function AddToCarts(Request $request){
        
        $product_id = $request->input('product_id');
        $qty = $request->input('qty');
        $color = $request->input('color');
        $size = $request->input('size');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            
            if($prod_check)
            {
                if(ProductCart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>"Already Added this product !"]);
                }else
                {

               
                        $cartItem =new ProductCart();
                        $cartItem->product_id = $product_id;
                        $cartItem->qty = $qty;
                        $cartItem->color = $color;
                        $cartItem->size = $size;
                        $cartItem->price=$prod_check->discount_price;
                        $cartItem->user_id = Auth::id();
                        $cartItem->save();
                        return response()->json(['status'=>$prod_check->title." Product Added To Cart !"]);
                    }
            }
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }
    public function CartList(){
        $data = ProductCart::where('user_id',Auth::id())->with('product')->get();
        //  $total=ProductCart::where('user_id',Auth::id())->sum('price');
        return view('page.Frontend.cartList',compact('data'));
    }
    public function RemoveCarts(Request $request){
        if(Auth::check())
        {
            $product_id=$request->input('product_id');

            if(ProductCart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartItem = ProductCart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"product Deleted successfully !"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Product Not Deleted !"]);
        }
    }
    public function MiniCarts(Request $request){
        $cartcount = ProductCart::where('user_id',Auth::id())->count();
        return response()->json(["counts"=>$cartcount]);
    }

    public function updateCarts(Request $request){
        $product_id=$request->input('product_id');
        $product_qty=$request->input('qty');
        if(Auth::check())
        {
            if(ProductCart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cart = ProductCart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cart->qty = $product_qty;
                $cart->update();
                return response()->json(['status'=>"QTY Updated !"]);
            }
        }
    }


}

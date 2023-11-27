<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function thankYou(){
        return view('page.Frontend.thankyouPage');
    }
    public function Checkout(Request $request){
        // out_of_stock je product table a ace ...cart theke checkout a gele auto delete hobe
        $old_cartItem=ProductCart::where('user_id',Auth::id())->get();
        foreach($old_cartItem as $item){
            if(!Product::where('id',$item->product_id)->where('stock','>=',$item->qty)->exists())
            {
                $removeCart = ProductCart::where('product_id',$item->product_id)->where('user_id',Auth::id())->first();
                $removeCart->delete();
            }
        }
        // checkout page a cart item show
        $products=ProductCart::where('user_id',Auth::id())->get();

        return view('page.Frontend.CheckoutPage',compact('products'));
    }
    public function orderPlace(Request $request){
        $order = new Invoice();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address1');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->postcode = $request->input('postcode');
        $order->user_id = Auth::id();
        $order->traking_no = 'e-mart-'.rand(1111,9999);

        $total = 0;
        $total_cartItems=ProductCart::where('user_id',Auth::id())->get();
        foreach($total_cartItems as $prod)
        {
             $total += $prod->price*$prod->qty;
        }
        $order->total_price=$total;

        $order->save();

        $order->id;
        $cartItems=ProductCart::where('user_id',Auth::id())->get();
        foreach($cartItems as $item)
        {
            InvoiceProduct::create([
                'invoice_id'=>$order->id,
                'product_id'=>$item->product_id,
                'qty'=>$item->qty,
                'sale_price'=>$item->price,
                'color'=>$item->color,
                'size'=>$item->size,
                'user_id'=>Auth::id(),
            ]);
            // product table stock and cart table qty update
            $prod = Product::where('id',$item->product_id)->first();
            $prod->stock = $prod->stock - $item->qty;
            $prod->update();
        }

        if(Auth::user()->address1 == Null)
        {
            $user =  User::where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address1');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->postcode = $request->input('postcode');
            $user->update();
        }
        $cartItems=ProductCart::where('user_id',Auth::id())->get();
        ProductCart::destroy($cartItems);
        return redirect('/thank-you')->with('status','order placed successfully !');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FilterProductController extends Controller
{
    public function search_products(Request $request)
    {
        $all_products = Product::whereBetween('price',[$request->left_value, $request->right_value])->get();
        return view('page.Frontend.shopPage',compact('all_products'))->render();
    }
    public function sort_by(Request $request)
    {
        if($request->sort_by == 'lowest_price'){
            $all_products = Product::orderBy('price','asc')->get();
        }
        if($request->sort_by == 'highest_price'){
            $all_products = Product::orderBy('price','desc')->get();
        }
        return view('page.Frontend.shopPage',compact('all_products'))->render();

    }
}

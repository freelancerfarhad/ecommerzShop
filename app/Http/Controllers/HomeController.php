<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\ProductSlider;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function HomePage(){
        $sliders= ProductSlider::all();
        $products= Product::where("status",1)->orderBy('id','DESC')->get();
        $categorys= Category::all();
        return view('page.Frontend.homePage',compact('sliders','products','categorys'));
    }
    public function CategorybyProduct($id)
    {
        $categorys=Category::orderby('id','ASC')->get();
        $brand= Brand::all();
        $products= Product::where("category_id",$id)->orderBy('id','DESC')->get();
        return view('page.Frontend.categorybyproduct',compact('categorys','brand','products'));
    } 
       public function BrandbyProduct($id)
    {
        $categorys=Category::orderby('id','ASC')->get();
        $brand= Brand::orderby('id','ASC')->get();
        $products= Product::where("category_id",$id)->orderBy('id','DESC')->get();
        return view('page.Frontend.brandbyproductpage',compact('categorys','brand','products'));
    }

    public function ProductDetailss($id){
        $products=Product::findOrFail($id);
        $product = ProductDetail::findOrFail($id);

        //multiple color
          $color=$product->color;
          $product_color=explode(',',$color);
  
       
        //multiple size
          $size=$product->size;
          $product_size=explode(',',$size);
      
          $productDetails= ProductDetail::where('product_id',$id)->with('product','product.brand','product.category')->get();
        return view('page.Frontend.productdetailspage',compact('productDetails','product','products','product_size','product_color'));

    }


    public function Shop(Request $request){
       
        $all_products= Product::all();
        return view('page.Frontend.shopPage',compact('all_products'));
    }
 
}

<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function productPage(): View{
        $products=Product::latest()->with('brand','category')->get();
        return view('page.Backend.ProductPage',compact('products'));
    }
    public function ProductCreate()
    {  
             $brands=Brand::latest()->get();
             $category=Category::latest()->get();
             return view('page.Backend.ProductCreatePage',compact('brands','category'));
    }
    public function StoreProduct(Request $request)
    {  
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);
        $image = $request->file('image');
        if($image) {
            $imageName =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $destinationPathThumbnail = public_path('uploads/product/');
            Image::make($image)->resize(800,800)->save($destinationPathThumbnail.$imageName);
        }

        // product insert and save
        $product                 = new Product();
        $product->brand_id       = $request->brand_id;
        $product->category_id    = $request->category_id;
        $product->title          = $request->title;
        $product->short_des      = $request->short_des;
        $product->price          = $request->price;
        $product->discount       = $request->discount;
        $product->discount_price = $request->discount_price;
        $product->stock          = $request->stock;
        $product->star           = $request->star;
        $product->remark         = $request->remark;
        $product->logn_des       = $request->logn_des;
        $product->image          = $imageName;
        $product->save();

        // product details
        $images = $request->file('detailsImg');
        foreach($images as $img){
            $gen_name =hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $destinationPathThumbnails = public_path('uploads/product/details/');
            Image::make($img)->resize(800,800)->save($destinationPathThumbnails.$gen_name);
        
            $multiimage = new ProductDetail();
            $multiimage->color= $request->color;
            $multiimage->size= $request->size;
            $multiimage->product_id=$product->id;
            $multiimage->detailsImg=$gen_name;
            $multiimage->save();
        }
        return redirect()->route('products');
    }
    public function ProductByIdEdit($id)
    {  
        $brands=Brand::latest()->get();
        $details=ProductDetail::where('product_id',$id)->get();
        $category=Category::latest()->get();
        $products=Product::find($id);
             return view('page.Backend.ProductEditPage',compact('brands','category','products','details'));
    }

    public function UpdateProduct(Request $request, $id){
        $product=Product::find($id);

        if ($request->hasFile('image')) {

            // Upload New File
            $image=$request->file('image');
            if (isset($image))
            {
                $deletedData='uploads/product/'.$product->image;
                if(File::exists($deletedData)){
                   File::delete($deletedData);
                }
                $imageName =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $destinationPathThumbnail = public_path('uploads/product/');
                Image::make($image)->resize(800,800)->save($destinationPathThumbnail.$imageName);
        
            }
            // Update Product
            $product->brand_id       = $request->brand_id;
            $product->category_id    = $request->category_id;
            $product->title          = $request->title;
            $product->short_des      = $request->short_des;
            $product->price          = $request->price;
            $product->discount       = $request->discount;
            $product->discount_price = $request->discount_price;
            $product->stock          = $request->stock;
            $product->star           = $request->star;
            $product->remark         = $request->remark;
            $product->logn_des       = $request->logn_des;
            $product->image          = $imageName;
            $product->save();



            return redirect()->route('products');
           
        } else {
         $product->brand_id       = $request->brand_id;
            $product->category_id    = $request->category_id;
            $product->title          = $request->title;
            $product->short_des      = $request->short_des;
            $product->price          = $request->price;
            $product->discount       = $request->discount;
            $product->discount_price = $request->discount_price;
            $product->stock          = $request->stock;
            $product->star           = $request->star;
            $product->remark         = $request->remark;
            $product->logn_des       = $request->logn_des;
            $product->save();
            
            // $productdetails = new ProductDetail();
            // $productdetails->color= $request->color;
            // $productdetails->size= $request->size;
            // $productdetails->product_id=$product->id;
            // $productdetails->save();

            return redirect()->route('products');
            
        }
             

    }
    public function MultipleImgCahange(Request $request)
{
   

        //  $image = $request->detailsImg;
         $image = $request->file('detailsImg');
         foreach($image as $id =>$img){
            $multiples=ProductDetail::find($id);
            $deletedData='uploads/product/details/'.$multiples->detailsImg;
            if(File::exists($deletedData)){
               File::delete($deletedData);
            }
            $img_urls =hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $destinationPathDetails = public_path('uploads/product/details/');
            Image::make($img)->resize(800,800)->save($destinationPathDetails.$img_urls);
                ProductDetail::where('id',$id)->update([
                'detailsImg' => $img_urls,
               
            ]);

         }
    // Toastr::success('Multi Image Successfully Updated :)' ,'Success');
    return redirect()->back();
}
public function MultipleImgCahangeDeleted(Request $request,$id)
{
        $oldimg=ProductDetail::find($id);
        $deletedData='uploads/product/details/'.$oldimg->detailsImg;
        if(File::exists($deletedData)){
        File::delete($deletedData);
        }
        $oldimg->delete();
        return redirect()->back();

}
public function statusActive(Request $request,$id)
{
    $product=Product::find($id)->update(['status'=> 1]);
    return redirect()->back();

}
public function statusInactive(Request $request,$id)
{
    $product=Product::find($id)->update(['status'=> 0]);
    // Toastr::success('Status Updated Inactive :)' ,'Success');
    return redirect()->back();

}   
public function destroy($id)
{
        // multiple image deleted
        $multImg=ProductDetail::where('product_id',$id)->get();
        foreach($multImg as $oldimg){
            $deletedDatamulti='uploads/product/details/'.$oldimg->detailsImg;
            if(File::exists($deletedDatamulti)){
               File::delete($deletedDatamulti);
            }
            $multImg=ProductDetail::where('product_id',$id)->delete();
        }
        
        $productDeleted=Product::findOrFail($id);
        $deletedData='uploads/product/'.$productDeleted->image;
        if(File::exists($deletedData)){
        File::delete($deletedData);
        }
        $productDeleted->delete();



    // Toastr::success('Product Deleted Successfully :)' ,'Success');
    return redirect()->back();

}

}

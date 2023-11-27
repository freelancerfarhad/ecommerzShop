<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProductSlider;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sliderPage()
    {   $sliders=ProductSlider::latest()->get();
         return view('page.Backend.sliderPage',compact('sliders'));
    }
    public function ProductCreate()
    {  
             $Products=Product::latest()->get();
             return view('page.Backend.sliderCreatePage',compact('Products'));
    }

    public function sliderStore(Request $request)
    { 
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);
        $image = $request->file('image');
        if($image) {
            $imageName =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $destinationPathThumbnail = public_path('uploads/slider/');
            Image::make($image)->resize(1170,500)->save($destinationPathThumbnail.$imageName);
        }
        // product insert and save
            $slider                 = new ProductSlider();
            $slider->title       = $request->title;
            $slider->short_des    = $request->short_des;
            $slider->price          = $request->price;
            $slider->product_id      = $request->product_id;
            $slider->image          = $imageName;
            $slider->save();
        return redirect()->route('slider');
    }
    public function sliderByIdEdit($id)
    {  
             $Products=Product::latest()->get();
             $sliders=ProductSlider::find($id);
             return view('page.Backend.sliderEditPage',compact('Products','sliders'));
    }
    public function sliderUpdate(Request $request, $id){
        $slider=ProductSlider::find($id);

        if ($request->hasFile('image')) {

            // Upload New File
            $image=$request->file('image');
            if (isset($image))
            {
                $deletedData='uploads/slider/'.$slider->image;
                if(File::exists($deletedData)){
                   File::delete($deletedData);
                }
                $imageName =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $destinationPathThumbnail = public_path('uploads/slider/');
                Image::make($image)->resize(1170,500)->save($destinationPathThumbnail.$imageName);
        
            }
            // Update Product
            $slider->title       = $request->title;
            $slider->short_des    = $request->short_des;
            $slider->price          = $request->price;
            $slider->product_id      = $request->product_id;
            $slider->image          = $imageName;
            $slider->save();
            return redirect()->route('slider');
           
        }else {
            $slider->title       = $request->title;
            $slider->short_des    = $request->short_des;
            $slider->price          = $request->price;
            $slider->product_id      = $request->product_id;
            $slider->save();
            return redirect()->route('slider');
            
        }
             

    }
    public function Deleteslider($id)
    {
            // multiple image deleted

            
            $productDeleted=ProductSlider::findOrFail($id);
            $deletedData='uploads/slider/'.$productDeleted->image;
            if(File::exists($deletedData)){
            File::delete($deletedData);
            }
            $productDeleted->delete();
    
    
    
        // Toastr::success('Product Deleted Successfully :)' ,'Success');
        return redirect()->back();
    
    }
}

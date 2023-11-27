<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    
    public function categoryPage(){
        return view('page.Backend.CategoryPage');
    }

    public function CategoryList()
    {
        $data= Category::all();
        return ResponseHelper::Out('success',$data,200);
    }

    public function CreateCategory(Request $request){
        $img=$request->file('categoryImg');
        $t=time();
        $file_name=$img->getClientOriginalExtension();
        $img_name="{$t}.{$file_name}";
        $img_url="uploads/category/{$img_name}";

        // Upload File
        $img->move(public_path('uploads/category/'),$img_name);
        // Save To Database
       $data = Category::create([
            'categoryName'=>$request->input('categoryName'),
            'categoryImg'=>$img_url,
        ]);
        // return ResponseHelper::Out('success',$data,200);
        return response()->json([
            'status' => 'success',
            'message' => 'Product Updated Successful',
        ],200);
    }
    public function UpdateCategory(Request $request){
        // $brand_id = Brand::find($id); 
        $brand_id=$request->input('id');

        if ($request->hasFile('categoryImg')) {

            // Upload New File
            $img=$request->file('categoryImg');
            $t=time();
            $file_name=$img->getClientOriginalExtension();
            $img_name="{$brand_id}-{$t}.{$file_name}";
            $img_url="uploads/category/{$img_name}";
            $img->move(public_path('uploads/category'),$img_name);

            // Delete Old File
            $filePath=$request->input('file_path');
            File::delete($filePath);

            // Update Product

            $data = Category::where('id',$brand_id)->update([
                'categoryName'=>$request->input('categoryName'),
                'categoryImg'=>$img_url,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Product Updated Successful',
            ],200);
            // return ResponseHelper::Out('success',$data,200);
        } else {
           $data = Category::where('id',$brand_id)->update([
                'categoryName'=>$request->input('categoryName'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Product Updated Successful',
            ],200);
            // return ResponseHelper::Out('success',$data,200);
        }

    }
    function CategoryById(Request $request)
    {
       
        $brand_id=$request->input('id');
        return Category::where('id',$brand_id)->first();
    }
    public function DeleteCategory(Request $request){
        $product_id=$request->input('id');
        $filePath=$request->input('file_path');
        File::delete($filePath);
        return Category::where('id',$product_id)->delete();

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Brand;
use App\Models\Invoice;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function Dashboard(){
        $user= User::where('role','!=',1)->get();
        $brand= Brand::all();
        $product= Brand::all();
        $newsale= Invoice::where('payment_status',0);
        $csale= Invoice::where('payment_status',1);
        $sales= Invoice::all();
        $category = Category::all();
        return view('page.backend.DashboardPage',compact('brand','category','product','user','newsale','csale','sales'));
    }
    public function AllUsers(){
        $users= User::where('role','!=',1)->get();
        return view('page.Backend.allUserPage',compact('users'));
    }
    public function AllUsersview($id){
        $userView = User::where('id',$id)->first();
        return view('page.Backend.userViewPage',compact('userView'));
    }
}

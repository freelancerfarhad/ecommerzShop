<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('page.AuthPage.users.dashboard');
    }
    public function orderList()
    {
        $orders = Invoice::where('user_id',Auth::id())->get();
        return view('page.AuthPage.users.order',compact('orders'));
    }  
      public function orderListView($id)
    {
        $orderItems = Invoice::where('id',$id)->where('user_id',Auth::id())->with('orderItem')->first();
        return view('page.AuthPage.users.orderView',compact('orderItems'));
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function OrderList(){
        $orders = Invoice::where('payment_status',0)->get();
        return view('page.Backend.OrderPage',compact('orders'));
    }
    public function OrderView($id){
        $orderItems = Invoice::where('id',$id)->with('orderItem')->first();
        return view('page.Backend.orderViewPage',compact('orderItems'));
    }
    public function OrderUpdate(Request $request, $id){
        $orders = Invoice::find($id);
        $orders->payment_status = $request->input('payment_status');
        $orders->update();
        return back()->with('success','Order Updated successfully !');
    }
    public function OrderHistory(){
        $orders = Invoice::where('payment_status',1)->get();
        return view('page.Backend.OrderHistory',compact('orders'));
    }
}

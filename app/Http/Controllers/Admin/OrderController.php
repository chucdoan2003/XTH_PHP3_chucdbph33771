<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{
    public function index(){
        $yourOrders=[];
        
       $orders= DB::table('orders')->latest()->get();
        // dd($orders);
        $sumOrder = count($orders);
     
        for($i=0; $i<count($orders); $i++){
            $yourOrders[]=[
                'orderItems'=>OrderItems::query()->where('orders_id', $orders[$i]->id)->get(),
                'order'=>$orders[$i]
            ];
        }
        // dd($yourOrders); 


        // dd($yourOrders[0][0]->product_name);
        $i=1;
        return view('admin.orders.index', compact('yourOrders', 'orders', 'i'));
    }
    public function status(Request $request, $id){
        if($request->status!='delivered'){
            Orders::query()->where('id', $id)->update([
            'order_status'=>$request->status
        ]);
        }else{
             Orders::query()->where('id', $id)->update([
            'order_status'=>$request->status,
            'payment_status'=>'paid'
             ]);
        }
        
        return redirect()->route('admin.orders.index');
    }
}

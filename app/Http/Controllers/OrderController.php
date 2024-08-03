<?php

namespace App\Http\Controllers;

use App\Mail\billEmail;
use App\Models\CartItems;
use App\Models\Carts;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\User;
use App\Models\Vourcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        $yourOrders=[];
        $user = Auth::user(); 
       $orders= DB::table('orders')->latest()->where('user_id', $user->id)->get();
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
        return view('public.orders', compact('yourOrders', 'sumOrder', 'orders','i'));
    }
    public function muahang(Request $request){
        // dd($request->cartItem_id);
        $user = Auth::user();
        $vourcher = Vourcher::query()->where('vourcher_code', $request->vourcher_code)->first();
        // dd($vourcher);
        

        $cart = Carts::query()->where('user_id', $user->id)->first();
        $total_amount=0;

        $proVariants = CartItems::query()
                        ->where('carts_id', $cart->id)
                        ->whereIn('cart_items.id', $request->cartItem_id)
                        ->join('product_variants', 'product_variants.id','=', 'cart_items.product_variants_id')
                        ->join('products','products.id','=','product_variants.product_id')
                        ->join('product_materials', 'product_materials.id', '=', 'product_variants.product_material_id')
                        ->join('product_colors', 'product_colors.id', '=', 'product_variants.product_color_id')
                        ->get([
                            'product_variants.id as product_variants_id',
                            'products.name as product_name', 'products.sku as product_sku', 'products.price as product_price',
                            'products.price_sale as product_price_sale','products.thumb_nail as product_thumb_nail',
                            'product_materials.name as variant_material_name', 'product_colors.name as variant_color_name',
                            'cart_items.quantity as quantity',
                             'cart_items.id as cartItem_id'
                        ])

        ;
        // dd($proVariants);
        $countProduct = count($proVariants);
        foreach($proVariants as $item){
            $total_amount+=$item->product_price_sale*$item->quantity;
        }
        // return view('public.cart',compact('total_amount', 'proVariants', 'countProduct'));
        return view('public.thanhtoan',compact('total_amount', 'proVariants', 'countProduct', 'vourcher'));
    }
    public function thanhtoan(Request $request){
        // dd($request);
        $user = Auth::user();
        $cart = Carts::query()->where('user_id', $user->id)->first();
        // Thêm thông tin vào orders
        $orderData = [
            'user_id'=>$user->id,
            'user_name'=>$request->user_name,
            'user_email'=>$request->user_email,
            'user_phone'=>$request->user_phone,
            'user_address'=>$request->user_address,
            'total_price'=>$request->total_amount,
        ];
        $order = Orders::query()->create($orderData);
        //Thông tin vào orderItems
        $proVariants = CartItems::query()
                        ->where('carts_id', $cart->id)
                        ->whereIn('cart_items.id', $request->cartItem_id)
                        ->join('product_variants', 'product_variants.id','=', 'cart_items.product_variants_id')
                        ->join('products','products.id','=','product_variants.product_id')
                        ->join('product_materials', 'product_materials.id', '=', 'product_variants.product_material_id')
                        ->join('product_colors', 'product_colors.id', '=', 'product_variants.product_color_id')
                        ->get([
                            'product_variants.id as product_variants_id',
                            'products.name as product_name', 'products.sku as product_sku', 'products.price as product_price',
                            'products.price_sale as product_price_sale','products.thumb_nail as product_thumb_nail',
                            'product_materials.name as variant_material_name', 'product_colors.name as variant_color_name',
                            'cart_items.quantity as quantity',
                             'cart_items.id as cartItem_id'
                        ])

        ;
        foreach($proVariants as $item){
            OrderItems::query()->create([
                'product_variants_id'=>$item->product_variants_id,
                'orders_id'=>$order->id,
                'product_name'=>$item->product_name,
                'product_sku'=>$item->product_sku,
                'product_price'=>$item->product_price,
                'product_price_sale'=>!empty($request->vourcher_value) ? $item->product_price_sale - $item->product_price_sale*$request->vourcher_value: $item->product_price_sale,
                'product_thumb_nail'=>$item->product_thumb_nail,
                'variant_material_name'=>$item->variant_material_name,
                'variant_color_name'=>$item->variant_color_name,
                'quantity'=>$item->quantity
            ]);
        }
        CartItems::query()
        ->where('carts_id', $cart->id)
        ->whereIn('id', $request->cartItem_id)->delete();
        $proVariants2 = OrderItems::query()->where('orders_id', $order->id)->get();
        $total_amount=$orderData['total_price'];
        Mail::to($orderData['user_email'])->send(new billEmail());

        return view('public.bill',compact('proVariants2','orderData','total_amount'));

        


        
    }
    public function bill(){
            
            return view('public.bill');
        }

   
}

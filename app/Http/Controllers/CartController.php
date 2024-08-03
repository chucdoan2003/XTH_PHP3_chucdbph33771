<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use App\Models\Carts;
use App\Models\Product;
use App\Models\productVariants;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addnewPr(Request $request){
        $product = Product::query()->where('id', $request->product_id)->first();

        $productVariant = productVariants::query()->where([
            'product_id'=>$request->product_id,
            'product_material_id'=>$request->product_material_id,
            'product_color_id'=>$request->product_color_id
        ])->first();
        // dd($productVariant);
        $user = Auth::user();

        $cart = Carts::query()->where('user_id', $user->id)->first();

        $data = [
            'product_variants_id'=>$productVariant->id,
            'carts_id'=>$cart->id,
            'quantity'=>$request->quantity
        ];
        // dd($data);

        //Kiểm tra trong cartItem có productVariant không
        $cartItem = CartItems::query()->where('product_variants_id', $productVariant->id)->first();

        if(empty($cartItem)){
             CartItems::query()->create($data);
        }else{
            $data['quantity']= $cartItem->quantity + $request->quantity;
            $cartItem->update($data); 
        }
        return redirect()->route('cart.list');



        // $data= $request->all();
        // DB::table('cartProducts')->insert([
        //     'id_user'=>$data['id_user'],
        //     'id_product'=>$data['id_product'],
        //     'quantity'=>$data['quantity']
        // ]);
        // $id_user= 1;
        // $data= DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
        //     ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
        //     ->where('cartproducts.id_user','=', 1)
        //     ->get();
        // ;
        // $countProduct= count($data);
        // $sumPrice = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
        //     ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
        //     ->where('cartproducts.id_user','=', 1)->sum('price');
        // $sumQuantity = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
        //     ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
        //     ->where('cartproducts.id_user','=', 1)->sum('quantity');
        
        // return view('public.cart',compact('data','sumPrice', "sumQuantity", 'countProduct'));
    }
    public function listProduct(){
        $user = Auth::user();

        $cart = Carts::query()->where('user_id', $user->id)->first();
        $total_amount=0;
        $proVariants = CartItems::query()->where('carts_id', $cart->id)
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
        return view('public.cart',compact('total_amount', 'proVariants', 'countProduct'));
        


        // $id_user= 1;
        // $data= DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
        //     ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
        //     ->where('cartproducts.id_user','=', 1)
        //     ->get();
        // ;
        // $countProduct= count($data);
        // $sumPrice = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
        //     ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
        //     ->where('cartproducts.id_user','=', 1)->sum('price');
        // $sumQuantity = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
        //     ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
        //     ->where('cartproducts.id_user','=', 1)->sum('quantity');
        
        // return view('public.cart',compact('data','sumPrice', "sumQuantity", 'countProduct'));
    }
    public function destroyCart($id){
        $user = Auth::user();
        $cart = Carts::query()->where('user_id', $user->id)->first();
        CartItems::query()
        ->where('carts_id', $cart->id)
        ->where('id', $id)
        ->delete();
        return redirect()->route('cart.list');
    }
    

}

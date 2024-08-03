<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\productColor;
use App\Models\productMaterial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::query()->latest()->take(8)->get();
        $categories = Category::query()->latest()->take(4)->get();
        $banners = Banner::query()->get();
        return view('public.home', compact('products', 'categories', 'banners'));
    }
    public function showdetailPr($id){
        $product= Product::query()->where('id',$id)->first();
        $proVariants = $product->variants->all();
        $colorIds=[];
        $materialIds=[];
        foreach($proVariants as $item){
            $colorIds[]= $item->product_color_id;
            $materialIds[]= $item->product_material_id;
        }
        $colors = productColor::query()->whereIn('id', $colorIds)->get();
        $materials = productMaterial::query()->whereIn('id', $materialIds)->get();
        
        $products = Product::query()->where('category_id', $product['category_id'])->get();
        return view('public.products.show', compact('product', 'products','colors', 'materials'));
    }
    public function showAllPr(){
        $productNB = Product::query()->where('category_id', 2)->get();
        $productsPK = Product::query()->where('category_id', 6)->get();
        $productsPN = Product::query()->where('category_id', 5)->get();
        $productsPB = Product::query()->where('category_id', 4)->get();
        $productsPLV = Product::query()->where('category_id', 3)->get();
        return view('public.products.index', compact('productNB','productsPK','productsPN','productsPB','productsPLV', ));
    }
    public function prCate($id){
        $products = Product::query()->where('category_id', $id)->get();
        $categoryName= Category::query()->where('id', $id)->first();
        
        return view('public.products.productCate', compact('products','categoryName'));
    }
}

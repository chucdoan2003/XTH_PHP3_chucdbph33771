<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\productColor;
use App\Models\productGalleries;
use App\Models\productMaterial;
use App\Models\productVariants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW= 'admin.products.';
    public function index()
    {   
        $data = Product::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::query()->get();
        $materials = productMaterial::query()->get();
        $colors = productColor::query()->get();
        $i=0;
        return view(self::PATH_VIEW.__FUNCTION__, compact('categories', 'materials', 'colors','i'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // $data= $request->except('image');
        // if($request->hasFile('image')){
        //     $data['image']=Storage::put('products',$request->file('image'));
        // }else{
        //     $data['image']="";
        // }
        // Product::query()->create($data);
        // return redirect()->route(self::PATH_VIEW.'index');
        
        //sản phẩm có biến thể
        //
        // $validate = $request->validate([
        //     'sku'=>['required'],
        //     'name'=>['required']
        // ]);

        $data = $request->except('product_variants', 'image_galleries', 'thumb_nail');
        if($request->hasFile('thumb_nail')){
            $data['thumb_nail'] = Storage::put('thumbnail', $request->file('thumb_nail'));
        }else{
            $data['thumb_nail'] = '';
        }
        $data['isActive']= 1;

        $listProVariants = $request->product_variants;

        $productVariants = [];
        foreach ($listProVariants as $item) {
            $productVariants[] = [
            "product_material_id" => isset($item['material']) ? $item['material'] : null,
            'product_color_id' => isset($item['color']) ? $item['color'] : null,
            'image' => !empty($item['image']) ? Storage::put('product_variants', $item['image']) : '',
            'quantity' => isset($item['quantity']) ? $item['quantity'] : 0,
            'price' => isset($item['price']) ? $item['price'] : 0
            ];
        }
        $listProGalleries = $request->image_galleries ? $request->image_galleries : [];

        $proGalleries = [];
        foreach ($listProGalleries as $item) {
            if(!empty($item)){
                $proGalleries[]=[
                    'image'=> Storage::put('product_galleries', $item)
                ];
            }
        }
        
        try{
            DB::beginTransaction();
                $product = Product::query()->create($data);

                foreach($proGalleries as $item){
                    $item += ['product_id'=>$product->id];
                    productGalleries::query()->create($item);
                }

                foreach($productVariants as $item){
                    $item += ['product_id'=>$product->id];
                    productVariants::query()->create($item);
                }

            DB::commit();
                return redirect()->route('admin.products.index');
        } catch (\Exception $exception){
            DB::rollBack();

            if(!empty($data['thumb_nail'] && Storage::exists($data['thumb_nail']))){
                Storage::delete($data['thumb_nail']);
            }

            foreach($proGalleries as $item){
                if(!empty($item['image']) && Storage::exists($item['image']))
                {
                    Storage::delete($item['image']);
                }
            }
        }

        

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // dd($product);
        return view('public.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        $categories = Category::query()->get();
        $proVariants = productVariants::query()
                ->join('product_colors', 'product_variants.product_color_id', 'product_colors.id')
                ->join('product_materials', 'product_variants.product_material_id', 'product_materials.id')
                ->select('product_variants.*', 'product_colors.name as color_name', 'product_materials.name as material_name')
                ->where('product_id', $product->id)
                ->get();
                ;
        $proGalleries = productGalleries::query()->where('product_id', $product->id)->get();

        return view(self::PATH_VIEW.__FUNCTION__, compact('product', 'categories', 'proVariants','proGalleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // $data= $request->except('image_galleries','product_variants','thumb_nail');
        // if($request->hasFile('image')){
        //     $data['image']=Storage::put('products',$request->file('image'));
        // }else{
        //     $data['image']= $product->image;
        // }
        // $product->update($data);


        //sản phẩm có biến thể
        $data = $request->except('product_variants', 'image_galleries', 'thumb_nail');
        if($request->hasFile('thumb_nail')){
            $data['thumb_nail'] = Storage::put('thumbnail', $request->file('thumb_nail'));
        }else{
            $data['thumb_nail'] = $product->thumb_nail;
        }
        $data['isActive']= 1;

        $listProVariants = $request->product_variants;

        $productVariants = [];
        $proVariants = productVariants::query()
                ->where('product_id', $product->id)
                ->get();
                ;
        foreach ($listProVariants as $item) {
            $productVariants[] = [
            'product_id'=> $product->id,
            "product_material_id" => isset($item['material']) ? $item['material'] : null,
            'product_color_id' => isset($item['color']) ? $item['color'] : null,
            'image' => !empty($item['image']) ? Storage::put('product_variants', $item['image']) : '',
            'quantity' => isset($item['quantity']) ? $item['quantity'] : 0,
            'price' => isset($item['price']) ? $item['price'] : 0
            ];
        }

        for($i=0; $i<count($productVariants); $i++ ){
            if($productVariants[$i]['image'] == ""){
                $productVariants[$i]['image']= $proVariants[$i]['image'];
            }
        }
        // dd($productVariants);


        $listProGalleries = $request->image_galleries ? $request->image_galleries : [];
        $galleries = productGalleries::query()->where('product_id', $product->id)->get();
        $proGalleries = [];
        foreach ($listProGalleries as $item) {
            if(!empty($item)){
                $proGalleries[]=[
                    'product_id'=>$product->id,
                    'image'=> Storage::put('product_galleries', $item)
                ];
            }
        }
        // dd($galleries[0]->product_id);

        
        if(count($proGalleries)<1){
            foreach($galleries as $item)
                $proGalleries[] = [
                    'product_id'=>$item->product_id,
                    'image'=>$item->image
            ];
        }
        // dd($proGalleries);
        
        try{
            DB::beginTransaction();
            
                if ($product->isDirty($data)) {
                    $product->update($data);
                }
                productGalleries::query()->where('product_id', $product->id)->delete();
                foreach($proGalleries as $item){
                    productGalleries::query()->create($item);

                }
                productVariants::query()->where('product_id', $product->id)->delete();
                foreach($productVariants as $item){
                    productVariants::query()->create($item);
                }

            DB::commit();
                return redirect()->route('admin.products.index');
        } catch (\Exception $exception){
            dd('lỗi');
            DB::rollBack();

            if(!empty($data['thumb_nail'] && Storage::exists($data['thumb_nail']))){
                Storage::delete($data['thumb_nail']);
            }

            foreach($proGalleries as $item){
                if(!empty($item['image']) && Storage::exists($item['image']))
                {
                    Storage::delete($item['image']);
                }
            }
        }
        return redirect()->route(self::PATH_VIEW.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try{
            DB::beginTransaction();
                $product->variants()->delete();
                $product->galleries()->delete();
                $product->delete();
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return back();
        }
        return redirect()->route('admin.products.index');
    }
}

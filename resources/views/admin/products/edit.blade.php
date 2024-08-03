@extends('layout.admin.master')
@section('title')
   Edit product  
@endsection
@section('link')
   Product > Edit
@endsection
@section('content')
<style>
    table {
    border: 1px solid #ccc; /* Đường viền mỏng màu xám */
}
th{
    padding: 8px 0;
}

th, td {
    border: 1px solid #ccc; /* Đường viền cho ô */
    text-align: center
}
</style>

    {{-- <div class="" style="background-color:#fff;margin: 16px 16px 16px 16px;padding: 16px"> --}}
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Sku</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="sku" value="{{ $product->sku }}">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Name</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="name" value="{{ $product->name }}">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Price</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="price" value="{{ $product->price }}">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Price sale</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="price_sale" value="{{ $product->price_sale }}">
            </div>

            
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Thumb nail</label>
                <input type="file" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; " name="thumb_nail" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Old Thumb nail</label>
                <img src="{{ Storage::url($product->thumb_nail) }}" style="width:100px; height: 100px" alt="">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px; display:flex; flex-direction: column">
                <label for="" class="" style="font-size: 18px;">Danh mục</label>
                <select name="category_id" id="" style="border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px;padding: 3px 8px;" >
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if ($product->category_id== $item->id) @checked(true)
                            
                        @endif>{{ $item->name }}</option>
                    @endforeach    
                </select>
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Description</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="description" value="{{ $product->description }}" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Product galleries</label>
                <input type="file" multiple class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="image_galleries[]" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Old Product galleries</label>
                <div class="flex flex-row flex-wrap gap-6 mt-2">
                    @foreach ($proGalleries as $item)
                        <img src="{{ Storage::url($item->image) }}" style="width:100px; height: 100px" alt="">
                    @endforeach
                </div>
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Biến thể</label>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Color</th>
                            <th>Old image</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                            @for ($i = 0; $i < count($proVariants); $i++)
                                <tr>
                                <td>
                                    <select name="product_variants[{{ $i }}][material]" id="">
                                        
                                            <option value="{{ $proVariants[$i]->product_material_id }}">{{ $proVariants[$i]->material_name }}</option>
                                        
                                        
                                    </select>
                                </td>
                                <td>
                                    <select name="product_variants[{{ $i }}][color]" id="">
                                            <option value="{{ $proVariants[$i]->product_color_id }}">{{ $proVariants[$i]->color_name }}</option>
                                    </select>
                                </td>
                                <td>
                                    <img src="{{ Storage::url($proVariants[$i]->image) }}" alt="" style="width: 100px; height: 100px;">
                                </td>
                                <td> 
                                    <input type="file" name="product_variants[{{ $i }}][image]">
                                </td>
                                <td>
                                    <input type="number" 
                                    style="border: 1px solid rgba(0,0,0,0.4); border-radius:5px; text-align:center"
                                    value="{{ $proVariants[$i]->quantity }}" name="product_variants[{{ $i }}][quantity]">
                                </td>
                                <td><input type="number"
                                    style="border: 1px solid rgba(0,0,0,0.4); border-radius:5px; text-align:center"
                                    name="product_variants[{{ $i }}][price]"
                                    value="{{ $proVariants[$i]->price }}"
                                    ></td>
                            </tr>
                            @endfor
                            
                                 
                    </tbody>
                </table>
            </div>
                <button type="submit" style="padding: 8px; background-color: rgb(48, 238, 31); width: 120px; border-radius: 10px;margin-bottom: 12px; margin: 0 0 0 16px;">Update</button>
        </form>
    {{-- </div>    --}}
@endsection
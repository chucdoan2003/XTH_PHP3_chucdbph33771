@extends('layout.admin.master')
@section('title')
   Thêm mới 
@endsection
@section('link')
   Sản phẩm > Thêm mới 
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
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Sku</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="sku">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Name</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="name">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Price</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="price">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Price sale</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="price_sale">
            </div>
            
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Thumb nail</label>
                <input type="file" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; " name="thumb_nail" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px; display:flex; flex-direction: column">
                <label for="" class="" style="font-size: 18px;">Danh mục</label>
                <select name="category_id" id="" style="border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px;padding: 3px 8px;" >
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach    
                </select>
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Description</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="description" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Product galleries</label>
                <input type="file" multiple class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="image_galleries[]" >
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Biến thể</label>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($materials as $material)
                            @foreach ($colors as $item)
                            <tr>
                                <td>
                                    <select name="product_variants[{{ $i }}][material]" id="">
                                        
                                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                                        
                                        
                                    </select>
                                </td>
                                <td>
                                    <select name="product_variants[{{ $i }}][color]" id="">
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    </select>
                                </td>
                                <td> 
                                    <input type="file" name="product_variants[{{ $i }}][image]">
                                </td>
                                <td>
                                    <input type="number" 
                                    style="border: 1px solid rgba(0,0,0,0.4); border-radius:5px; text-align:center"
                                    value="1" name="product_variants[{{ $i }}][quantity]">
                                </td>
                                <td><input type="number"
                                    style="border: 1px solid rgba(0,0,0,0.4); border-radius:5px; text-align:center"
                                    name="product_variants[{{ $i }}][price]"></td>
                            </tr>
                                @php
                                 $i++   
                                @endphp
                            @endforeach  


                        
                       @endforeach

                        
                        


                    </tbody>
                </table>
            </div>
            
                <button type="submit" style="padding: 8px; background-color: rgb(48, 238, 31); width: 120px; border-radius: 10px;margin-bottom: 12px; margin: 0 0 0 16px;">Tạo mới</button>
            
        </form>
        
    {{-- </div>    --}}
@endsection
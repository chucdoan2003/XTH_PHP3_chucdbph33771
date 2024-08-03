@extends('layout.public.master')
@section('title')
    Chi tiết sản phẩm   
@endsection
@section('content')
<style>
.radio-group2 label {
  display: inline-block;
  padding: 10px 20px;
  border: 2px solid #ccc;
  border-radius: 25px; /* Change to make it rounded rectangle */
  cursor: pointer;
  margin-right: 10px;
  transition: background-color 0.3s, border-color 0.3s, border-width 0.3s;
}

/* Thay đổi giao diện khi radio được chọn */
.radio-group2 input[type="radio"]:checked + label {
  background-color: #4CAF50;
  border-color: #4CAF50;
  border-width: 3px; /* Làm border đậm hơn */
  color: white;
}
</style> 

    <div class="px-16" style="background-color:#F7F7F7; padding-top: 16px;">
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <div class="flex flex-row gap-4 ">
                    <div class="w-5/12">
                        <img src="{{ Storage::url($product->thumb_nail) }}" alt="" style="width: 100%;">
                    </div>
                 
                    <div class="w-7/12 " >
                        <div class="px-4 py-3" style="background-color: #fff;padding">
                            <h3 class="text-3xl font-bold text-red-600">{{ $product->name }}</h3>
                            <div class="flex flex-row gap-5 mt-2">
                                <div>Mã sản phẩm:<span class="text-red-700 font-semibold"> {{ $product->sku }}</span> </div>
                                <div>Tình trạng:<span class="text-red-700 font-semibold"> Còn hàng</span> </div>
                                <div>Thương hiệu: <span class="text-red-700 font-semibold">Moho</span></div>
                            </div>
                            <div class="mt-4 py-4 px-4 " style="background-color: #f7f5f5; border-radius: 5px;">
                                <div class="flex flex-row gap-5 font-semibold items-center"><span>Giá:</span> <span class="text-red-500 font-bold " style="font-size: 20px">{{ $product->price_sale }} vnđ</span> <del class="text-gray-400">{{ $product->price }} vnđ</del> </div>
                            </div>
                            <div class="flex flex-row gap-4 items-center mt-4">
                                <div>
                                    Màu sắc: 
                                </div>
                                <div style="cursor: pointer;" class="radio-group2">
                                @foreach ($colors as $item)
                                    <input type="radio" name="product_color_id" id="radio_color_{{ $item->id }}" style="display:none" value="{{ $item->id }}" >

                                    <label for="radio_color_{{ $item->id }}">{{ $item->name }}</label>
                                @endforeach
                                </div>

                                {{-- <div style="background-color: black; width: 50px; height: 50px;"></div>
                                <div style="background-color: rgb(82, 78, 78); width: 50px; height: 50px;"></div>
                                <div style="background-color: rgb(205, 42, 42); width: 50px; height: 50px;"></div>
                                <div style="background-color: rgb(133, 179, 36); width: 50px; height: 50px;"></div>
                                <div style="background-color: rgba(220, 166, 50, 0.296); width: 50px; height: 50px;"></div> --}}
                            </div>
                             <div class="flex flex-row gap-4 items-center mt-4 radio-group2">
                                <div>
                                    Materials: 
                                </div>
                                @foreach ($materials as $item)
                                    <input type="radio" name="product_material_id" id="radio_material_{{ $item->id }}" style="display:none" value="{{ $item->id }}">
                                    <label for="radio_material_{{ $item->id }}">{{ $item->name }}</label>
                                @endforeach
                                {{-- <div style="background-color: black; width: 50px; height: 50px;"></div>
                                <div style="background-color: rgb(82, 78, 78); width: 50px; height: 50px;"></div>
                                <div style="background-color: rgb(205, 42, 42); width: 50px; height: 50px;"></div>
                                <div style="background-color: rgb(133, 179, 36); width: 50px; height: 50px;"></div>
                                <div style="background-color: rgba(220, 166, 50, 0.296); width: 50px; height: 50px;"></div> --}}
                            </div>
                            <div class="flex flex-row items-center mt-4 gap-3">
                                <div>Số lượng:</div>
                                <input type="hidden" value="1" name="id_user">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="number" style="border: 1px solid #000; border-radius: 8px;text-align:center" value="1" name="quantity">
                            </div>
                            <div class="flex flex-row mt-4 gap-4">
                                <button type="submit" style="padding: 16px; border: 2px solid rgba(0, 0, 0, 0.3); width: 50%;font-size: 20px;font-weight: 600;border-radius: 8px; background-color:rgb(240, 61, 61);color: #eae3e3;border:none">
                                    Thêm vào giỏ hàng
                                </button>
                                <button style="padding: 16px; border: 2px solid rgba(0, 0, 0, 0.3); width: 50%;font-size: 20px;font-weight: 600;border-radius: 8px;background-color:rgb(91, 195, 39);color: #eae3e3;border:none" >Mua ngay</button>
                            </div>
                            <div>
                                <div class="mt-2 text-green-500 font-semibold">
                                    <i class="fa-solid fa-dice-one"></i>
                                    1 Năm Bảo Hành
                                </div>
                                <div class="mt-2 text-green-500 font-semibold">
                                    <i class="fa-solid fa-dice-one"></i>
                                    Hỗ trợ đổi trong 3 ngày cho sản phẩm nguyên giá
                                </div>
                                <div class="mt-2 text-green-500 font-semibold">
                                    <i class="fa-solid fa-dice-one"></i>
                                    Hotline: 1900 63 64 76(9-21h)
                                </div>
                                
                            </div>
                        </div>
                        <div class="mt-3 px-3 py-4" style="background-color: #fff">
                            <h3 class="text-red-500 font-bold text-2xl">Mô tả</h3>
                            <p>Ghế văn phòng Joy với bộ khung chắc chắn, nệm foam và bọc vải mesh là một lựa chọn phù hợp cho bàn học/bàn làm việc gia đình hoặc không gian công sở nhỏ.</p>
                            <p>1. Thiết kế:<br>

                                - Ghế Joy có thiết kế trẻ trung và hiện đại, thích hợp cho các môi trường văn phòng hiện đại, như văn phòng công ty, cơ quan, hoặc không gian làm việc tại nhà.<br>

                                - Ghế có kích thước nhỏ gọn, phù hợp với không gian nhỏ hoặc tạo ra sự gọn gàng cho văn phòng của bạn.</p>
                                <p>2. Đệm foam:<br>

                                - Ghế Joy được trang bị đệm foam bọc bên trong lớp vải mesh, giúp cung cấp sự thoải mái và hỗ trợ cho người sử dụng trong thời gian dài.<br>

                                - Foam có độ đàn hồi tốt, giúp giảm áp lực lên cơ lưng và cột sống, làm giảm mệt mỏi trong quá trình làm việc hoặc làm công việc liên quan đến ngồi nhiều giờ.<br></p>
                                <p>3. Vải mesh:<br>

                                - Lớp vải mesh trải dọc lưng ghế Joy giúp cải thiện thông thoáng và thoáng khí, giúp người sử dụng cảm thấy thoải mái và không bị nóng khi ngồi trong thời gian dài.<br>

                                - Vải mesh thường làm từ các sợi vải có độ co dãn, tạo sự ôm vừa vặn và hỗ trợ cho lưng và cổ.</p>
                        </div>
                        
                    </div>
                       
                   
            </div>
       </form>
       <div class="mt-3 rounded-md px-4 py-4">
            <h2 class="text-3xl text-red-500 font-bold">Sản phẩm liên quan</h2>
            <div class="flex flex-wrap flex-row gap-3">
                @foreach ($products as $item)
                    <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:315px;padding: 0 0 16px 0; " >
                    <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:300px;">
                    <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ Str::limit($item->name, 20) }}</a></p>
                    <p class="text-red-600 font-bold">{{ $item->price }}</p>
                    <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                </div>
                @endforeach
                
            
            
            
        </div>
       </div>
     
    
    </div>     
@endsection
@extends('layout.public.master')
@section('title')
    Giỏ hàng  
@endsection
@section('content')
    <div class="px-16" style="background-color:#F7F7F7; padding: 16px  64px 16px">
        <form action="{{ route('muahang') }}" method="POST">
            @csrf
            <div class="flex flex-row gap-4">
                <div class="mainx px-3 py-4 flex-1 rounded-md" style="background-color: #fff">
                    <div class="" style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                        <h3 class="text-2xl text-red-500 font-semibold pb-2">Giỏ hàng của bạn</h3>
                    </div>
                    <div class="my-3">Bạn đang có {{ $countProduct }} sản phẩm trong giỏ</div>
                    <div style="border: 1px solid rgba(0, 0, 0, 0.3) " class="flex flex-col">
                        @foreach ($proVariants as $item)
                             <div class="flex flex-row items-center gap-2 my-2" style="box-shadow:0 1px 0 rgba(0, 0, 0, 0.2)"> 
                                <div >
                                <img src="{{ Storage::url($item->product_thumb_nail) }}" style="width: 150px;" class="object-cover" alt="">
                                </div>
                                <div class="flex flex-row gap-3 items-center">
                                
                                    <h3 class="text-lg font-semibold text-blue-500">{{ $item->product_name }}</h3>
                                    <div>
                                        Biến thể: {{ $item->variant_material_name }}, {{ $item->variant_color_name }}
                                    </div>
                                    <div>Giá: <span class="text-red-600 font-semibold">{{ $item->product_price_sale }} VNĐ</span></div>
                                    <div><del>
                                    <span class="text-red-300 font-semibold">{{ $item->product_price }} VNĐ</span>    
                                    </del></div>
                                    <div>Số lượng:<span class="text-red-600 font-semibold">{{ $item->quantity }}</span></div>
                                <div>
                                    
                                    <a href="{{ route('cart.destroy', $item->cartItem_id) }}"><button type="button" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(0, 0, 0); border: none"
                                        onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                                        >Xóa</button>  </a>  
                                   
                                </div>  
                                <div><input type="checkbox" name="cartItem_id[]" value="{{ $item->cartItem_id }}" checked></div>
                                <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                
                            </div>
                            </div>
                            @php
                                $total_amount +=$item->product_price_sale   
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="aside px-3 py-4 rounded-md" style="width: 436px; background-color: #fff;">
                    <div style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                      <h3 class="text-2xl text-red-500 font-semibold pb-2">Thông tin đơn hàng</h3>
                    </div>
                    <div class="flex justify-between my-1">
                        <p style="font-size: 18px">Tổng tiền hàng:</p>
                        <p class="text-red-500 font-semibold" style="font-size: 18px">{{ $total_amount }} VNĐ</p>
                    </div>
                    <div style="background-color: #fff; margin:8px 4px; ; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Áp mã giảm giá</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="vourcher_code" >
                    </div>
                    <div class="flex justify-between my-1 pb-2" style="box-shadow: 0 1px rgba(0, 0, 0, 0.2)">
                        <p style="font-size: 18px">Phí giao hàng:</p>
                        <p class="text-gray-500 font-semibold" style="font-size: 18px">0 vnđ</p>
                    </div>
                    
                    
                 
                         {{-- <input type="hidden" name="sumQuantity" value="{{ $sumQuantity }}"> --}}
                        <div class="mt-3"><button type="submit" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(218, 60, 60); border: none; width: 100%;">Mua hàng</button></div>


                </div>
            </div>
        

        </form>
      

    </div>
@endsection
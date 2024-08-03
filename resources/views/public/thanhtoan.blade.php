@extends('layout.public.master')
@section('title')
    Đơn hàng
@endsection
@section('content')

    <div class="px-16" style="background-color:#F7F7F7; padding: 16px  64px 16px">
        <form action="{{ route('thanhtoan') }}" method="POST">
            @csrf
            <div class="flex flex-row gap-4">
                <div class="mainx px-3 py-4 flex-1 rounded-md" style="background-color: #fff">
                    <div class="" style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                        <h3 class="text-2xl text-red-500 font-semibold pb-2">Thông tin người nhận</h3>
                    </div>
                    <div style="background-color: #fff; margin: 16px;  border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Name:</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="user_name">
                    </div>
                    <div style="background-color: #fff; margin: 16px;  border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Email:</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="user_email">
                    </div>
                    <div style="background-color: #fff; margin: 16px; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Phone number:</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="user_phone">
                    </div>
                    <div style="background-color: #fff; margin: 16px;  border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Address:</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="user_address">
                    </div>
                    <div class=" px-3  rounded-md" style="width: 100%; background-color: #fff;">
                        <div class="flex justify-between my-1 " style=""> 
                            <p>Tổng tiền hàng:</p>
                            <p class="text-red-500 font-semibold">{{ $total_amount }} VNĐ</p>
                        </div>
                        <div class="flex justify-between my-1">
                            <p>Giảm giá vourcher:</p>
                            <div>
                                <span style="padding: 2px 8px; background-color:rgb(228, 117, 117); border-radius: 5px">-{{ !empty($vourcher->vourcher_value )? $vourcher->vourcher_value*100 : 0 }}%</span>

                                <span class="text-yellow-600">{{!empty($vourcher->vourcher_value ) ? -$total_amount*$vourcher->vourcher_value : 0 }}VNĐ</span>

                            </div>
                        </div>
                        <div class="flex justify-between my-1 pb-2" style="box-shadow: 0 1px rgba(0, 0, 0, 0.2)">
                            <p>Phí giao hàng:</p>
                            <p class="text-gray-500 font-semibold">0 vnđ</p>
                        </div>
                        <div class="flex justify-between my-1">
                            @php
                            if(!empty($vourcher->vourcher_value ))
                                $total_amount= $total_amount - $total_amount*$vourcher->vourcher_value;
                            @endphp
                            <p>Số tiền thanh toán:</p>
                            <p class="text-red-500 font-semibold">{{ $total_amount }} vnđ</p>
                        </div>
                        <div>
                            <span>Chọn phương thức thanh toán</span>
                            <div>
                                <input type="radio" name="pttt" id="ttonline">
                                <label for="ttonline">Thanh toán online</label>
                            </div>
                            <div>
                                <input type="radio" name="pttt" id="ttoff">
                                <label for="ttoff">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    
                            {{-- <input type="hidden" name="sumQuantity" value="{{ $sumQuantity }}"> --}}
                            <div class="mt-3"><button type="submit" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(218, 60, 60); border: none; width: 100%;">Thanh toán</button></div>


                    </div>
                </div>
                <div class="aside px-3 py-4 rounded-md" style="width: 50%; background-color: #fff;">
                    <div class="" style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                        <h3 class="text-2xl text-red-500 font-semibold pb-1">Thông tin sản phẩm</h3>
                    </div>
                    <div style="border: 1px solid rgba(0, 0, 0, 0.3) " class="flex flex-col">
                      
                        @foreach ($proVariants as $item)
                            
                             <div class="flex flex-row gap-2 my-2" style="box-shadow:0 1px 0 rgba(0, 0, 0, 0.2)"> 
                                <div >
                                <img src="{{ Storage::url($item->product_thumb_nail) }}" style="width: 150px;" class="object-cover" alt="">
                                </div>
                                <div class="ml-3 text-lg">
                                
                                        <h3 class="text-2xl font-semibold text-blue-700">{{ ucwords($item->product_name) }}</h3>
                                        <div class="flex flex-row gap-2">
                                            <div>Mã sản phẩm:<span class="text-red-700 font-semibold"> {{ $item->product_sku }}</span> </div>
                                            <div>Thương hiệu: <span class="text-red-700 font-semibold">Moho</span></div>
                                        </div>
                                        <div>
                                            Biến thể: {{ $item->variant_material_name }}, {{ $item->variant_color_name }}
                                        </div>
                                        <div class="flex flex-row gap-4">
                                            <div>
                                                Giá: <span class="text-red-600 font-semibold" style="padding: 2px 8px; background-color:rgb(189, 230, 44); border-radius: 5px">{{ $item->product_price_sale }} VNĐ</span>
                                                    <div class="my-1">
                                                         Giảm giá vourcher: <span style="padding: 2px 8px; background-color:rgb(228, 117, 117); border-radius: 5px">-{{ !empty($vourcher->vourcher_value) ? $vourcher->vourcher_value*100 : 0 }}%</span>

                                                    </div>
                                                    <div class="text-lg my-1">
                                                        Giá sau khi áp mã: <span class="text-white" style="padding: 2px 8px; background-color:rgb(18, 139, 28); border-radius: 5px">{{!empty($vourcher->vourcher_value) ? $item->product_price_sale - $item->product_price_sale*$vourcher->vourcher_value : $item->product_price_sale}} VNĐ</span> 

                                                    </div>
                                            </div>
                                            <div><del>
                                            </del></div>
                                        </div>
                                        
                                        <div class="my-1">Số lượng:<span class="text-red-600 font-semibold">  {{ $item->quantity }}</span></div>
                                        <input type="hidden" name="cartItem_id[]" value='{{ $item->cartItem_id  }}'>
                                        <input type="hidden" name="vourcher_value" value='{{ !empty($vourcher->vourcher_value) ? $vourcher->vourcher_value : 0  }}'>

                                        <input type="hidden"name="total_amount" value="{{ $total_amount }}">
                                        <div>
                                        
                                  
                                    
                                    </div>  
                                
                                </div>
                            </div>
                           
                        @endforeach
                    </div>
                   
                </div>
            </div>
        

        </form>
      

    </div>

@endsection
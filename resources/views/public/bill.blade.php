@extends('layout.public.master')
@section('title')
    Đơn hàng
@endsection
@section('content')

    <div class="px-16" style="background-color:#F7F7F7; padding: 16px  64px 16px">
        
       
            <div class="mainx px-3 py-4 rounded-md" style=";width: 900px; margin: 0 auto;">
                    <div class="rounded-md" style=";background-color: #fff;padding-top:10px">
                        <h3 class="text-2xl text-red-500 font-semibold pb-2" style="text-align:center">Thanh toán thành công <i class="fa-solid fa-circle-check" style="color: rgb(47, 182, 47)"></i></h3>
                    </div>
                
                    <div style="background-color: #fff;" class="px-4 py-1 mt-4 rounded-md">
                        <h3 class="mt-3 ml-4 text-lg font-semibold mb-1">Thông tin người nhận</h3>
                        <div style="border:1px solid rgba(0, 0, 0, 0.4)"></div>
                        <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.5); margin-bottom:12px">
                            <p>
                                <span class="text-base font-medium">Name</span>: {{ $orderData['user_name'] }}
                                
                            </p>
                            <p>
                                <span class="text-base font-medium">Email</span>: {{ $orderData['user_email'] }}
                            </p>
                            <p>
                                <span class="text-base font-medium">Phone number</span>:  {{ $orderData['user_phone'] }}
                                {{-- {{ $orderData->user_name }} --}}
                            </p>
                             <p>
                                <span class="text-base font-medium">Address</span>:  {{ $orderData['user_address'] }}
                                {{-- {{ $orderData->user_name }} --}}
                            </p>
                        </div>
                    </div>
                    <div style="background-color: #fff; padding: 12px 0 16px 0" class="px-4  mt-4 rounded-md">
                        <h3 class="mt-3 ml-4 text-lg font-semibold mb-1">Thông tin đơn hàng</h3>
                        <div style="border:1px solid rgba(0, 0, 0, 0.4)"></div>
                        @foreach ($proVariants2 as $item)
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
                                    <div>Số lượng:<span class="text-red-600 font-semibold">  {{ $item->quantity }}</span></div>
                               
                                <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                
                            </div>
                            </div>
                           
                        @endforeach
                        <div class="flex justify-between  align-middle mt-2">
                            <div>
                                <span class="text-xl font-semibold">Tổng tiền: </span> <span class="text-red-600 text-lg font-medium">{{ $total_amount }} VNĐ </span> 
                            </div>
                            <span><a href="{{ route('orders.index') }}"><button style="padding: 4px 16px;background-color:rgba(9, 134, 207, 0.658);border-radius:5px;color:#413f3f; font-weight: 600;">Đi tới đơn hàng</button></a></span>
                        </div>
                    </div>
                   
            </div>
            
      

    </div>

@endsection
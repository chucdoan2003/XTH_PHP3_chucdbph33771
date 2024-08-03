@extends('layout.public.master')
@section('title')
    Giỏ hàng  
@endsection
@section('content')
    <div class="px-16" style="background-color:#F7F7F7; padding: 16px  64px 16px">
        <form action="{{ route('thanhtoan') }}" method="POST">
            @csrf
            <div class="flex flex-row gap-4">
                <div class="mainx px-3 py-4 flex-1 rounded-md" style="background-color: #fff">
                    <div class="" style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                        <h3 class="text-2xl text-red-500 font-semibold pb-2">Đơn hàng của bạn</h3>
                    </div>
                    <div class="my-3">Bạn đang có {{ $sumOrder }} đơn hàng</div>
                        @foreach ($yourOrders as $items)
                        <div><h3 class="text-xl text-orange-600 font-semibold mb-3">Đơn hàng {{ $i++ }}</h3>
                        <div style="border: 1px solid rgba(0, 0, 0, 0.3) " class="flex flex-col my-3">
                            
                            
                                @foreach ($items['orderItems'] as $item)
                                    <div class="flex flex-row items-center gap-2 my-2" style="box-shadow:0 1px 0 rgba(0, 0, 0, 0.2)"> 
                                        <div >
                                        <img src="{{ Storage::url($item['product_thumb_nail']) }}" style="width: 150px;" class="object-cover" alt="">
                                        </div>
                                        <div class="flex flex-row gap-3 items-center">
                                        
                                            <h3 class="text-lg font-semibold text-blue-500">{{ $item['product_name'] }}</h3>
                                            <div>Giá: <span class="text-red-600 font-semibold">{{ $item['product_price_sale'] }}</span></div>
                                            <div><del><span class="text-red-600 font-semibold">{{ $item['product_price'] }}</span></del></div>
                                            <div>Số lượng:<span class="text-red-600 font-semibold">2</span></div>
                                            
                                        {{-- <div>
                                            
                                            <a href="{{ route('cart.destroy', $item->id) }}"><button type="button" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(134, 134, 134); border: none"
                                                onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                                                >Xóa</button>  </a>  
                                        
                                        </div>  
                                        <div><input type="checkbox" name="id_pr[]" value="{{ $item->id }}" checked></div>
                                        <input type="hidden" name="quantity[]" value="{{ $item->quantity }}"> --}}
                                        
                                     </div>

                                    </div>
                                @endforeach
                                     

                           {{-- @foreach ($orders as $order)
                            @endforeach --}}
                            
                        <div class="flex flex-row justify-between px-4 my-2 items-center">
                                <div class="text-xl">Trạng thái: <span class="text-blue-600 text-xl">Đang chờ xác nhận</span>
                                    {{-- <span><b>Tổng giá: <span>{{ $yourOrder->sumPrice }}</span></b></span> --}}
                                </div>
                                <div><Button style="padding: 8px 12px; border: 2px solid rgba(226, 25, 25, 0.3); width: 200px;font-size: 18px;font-weight: 600;border-radius: 8px; background-color:rgb(214, 59, 20);color: #fff;border:none" >Hủy đơn hàng</Button></div>
                        </div>
                        <div class="px-4 mb-3">
                             
                            <span class="text-xl font-semibold">Tổng tiền:</span> <span class="text-red-600 text-xl font-semibold">{{ $items['order']->total_price }}</span> VNĐ
                                
                        </div>
                            
                        
                            
                        
                            
                        
                        </div>
                    </div>
                    @endforeach

                    
                    
                </div>
            </div>
        

        </form>
      

    </div>
@endsection
@extends('layout.public.master')
@section('title')
    Sản phẩm
@endsection
@section('content')
    <div class="px-16 " style="background-color:#F7F7F7">
        <div class="pt-3">
            <h3 class="font-bold text-3xl text-red-500">Sản phẩm nổi bật</h3>
            <div class="flex flex-wrap flex-row gap-3">
                @foreach ($productNB as $item)
                
                    <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                        <a href="{{ route('product.show', $item->id) }}" style="color: #000;">
                    <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:100%;">
                    <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ $item->name }}</a></p>
                    <p class="text-red-600 font-bold">{{ $item->price }} VNĐ</p>
                    <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                    </a>
                    </div>
                @endforeach
                
                
                
                
            </div>
        </div>

        <div class="pt-3">
            <h3 class="font-bold text-3xl text-red-500">Phòng khách</h3>
            <div class="flex flex-wrap flex-row gap-3">
                @foreach ($productsPK as $item)
                
                    <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                        <a href="{{ route('product.show', $item->id) }}" style="color: #000;">
                    <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:100%;">
                    <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ $item->name }}</a></p>
                    <p class="text-red-600 font-bold">{{ $item->price }} VNĐ</p>
                    <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                    </a>
                    </div>
                @endforeach
                
                
                
                
            </div>
        </div>

        <div class="pt-3">
            <h3 class="font-bold text-3xl text-red-500">Phòng ngủ</h3>
            <div class="flex flex-wrap flex-row gap-3">
                @foreach ($productsPN as $item)
                
                    <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                        <a href="{{ route('product.show', $item->id) }}" style="color: #000;">
                    <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:100%;">
                    <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ $item->name }}</a></p>
                    <p class="text-red-600 font-bold">{{ $item->price }} VNĐ</p>
                    <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                    </a>
                    </div>
                @endforeach
                
                
                
                
            </div>
        </div>

        <div class="pt-3">
            <h3 class="font-bold text-3xl text-red-500">Phòng bếp</h3>
            <div class="flex flex-wrap flex-row gap-3">
                @foreach ($productsPB as $item)
                
                    <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                        <a href="{{ route('product.show', $item->id) }}" style="color: #000;">
                    <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:100%;">
                    <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ $item->name }}</a></p>
                    <p class="text-red-600 font-bold">{{ $item->price }} VNĐ</p>
                    <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                    </a>
                    </div>
                @endforeach
                
                
                
                
            </div>
        </div>

        <div class="pt-3">
            <h3 class="font-bold text-3xl text-red-500">Phòng làm việc</h3>
            <div class="flex flex-wrap flex-row gap-3">
                @foreach ($productsPLV as $item)
                
                    <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                        <a href="{{ route('product.show', $item->id) }}" style="color: #000;">
                    <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:100%;">
                    <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ $item->name }}</a></p>
                    <p class="text-red-600 font-bold">{{ $item->price }} VNĐ</p>
                    <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                    </a>
                    </div>
                @endforeach
                
                
                
                
            </div>
        </div>
        
    </div>
@endsection
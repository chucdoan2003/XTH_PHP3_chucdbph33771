@extends('layout.public.master')
@section('title')
    Home   
@endsection
@section('content')
<div class="px-16 " style="background-color:#F7F7F7">
  

    @include('public.slider')
    <div class="flex flex-row gap-3">
        @foreach ($categories as $item)
            <div class="w-1/4 mt-4 rounded-md" style="background-color: #fff; text-align:center; padding: 0 0 12px 0;" >
            <img src="{{ Storage::url($item->image) }}" alt="">
            <p class="text-red-500 mt-2 font-semibold"><a href="{{ route('product.cate', $item->id) }}">{{ $item->name }}</a></p>
        </div>
        @endforeach
        
        {{-- <div class="w-1/4 mt-4 rounded-md" style="background-color: #fff; text-align:center">
            <img src="{{ asset('image/phongngu.jpg') }}" alt="">
            <p class="text-red-500 mt-2 font-semibold">Phòng ngủ</p>
        </div>
        <div class="w-1/4 mt-4 rounded-md" style="background-color: #fff; text-align:center">
            <img src="{{ asset('image/phongbep.jpg') }}" alt="">
            <p class="text-red-500 mt-2 font-semibold">Phòng bếp</p>
        </div>
        <div class="w-1/4 mt-4 rounded-md" style="background-color: #fff; text-align:center">
            <img src="{{ asset('image/phonglamviec.jpg') }}" alt="">
            <p class="text-red-500 mt-2 font-semibold">Phòng làm việc</p>
        </div> --}}
    </div>
    <div class="mt-3">
        <h3 class="font-bold text-3xl text-red-500">Sản phẩm nổi bật</h3>
        <div class="flex flex-wrap flex-row gap-3">
            @foreach ($products as $item)
            
                <div class="mt-4 rounded-md" style="background-color: #fff;text-align:center;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                    <a href="{{ route('product.show', $item->id) }}" style="color: #000;">
                <img src="{{ Storage::url($item->thumb_nail) }}" alt="" style="width:100%;">
                <p class="mt-3 px-3"><a href="{{ route('product.show', $item->id) }}">{{ Str::limit($item->name, 20)  }}</a></p>
                <p class="text-red-600 font-bold">{{ $item->price }} VNĐ</p>
                <div><button class="hover:border-1 hover:text-green-600" style="padding: 8px 16px; border: 2px solid #e57171;border-radius:10px">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus text-red-600"></i></button></div>
                </a>
                </div>
            @endforeach
            
            
            
            
        </div>
    </div>
    <div class="flex flex-row mt-3 gap-4">
        <div class="w-1/2 ">
            <img src="{{ asset('image/giuongsapa.jpg') }}" alt="">
        </div>
        <div class="w-1/2">
            <img src="{{ asset('image/giuongchicago.jpg') }}" alt="">
        </div>

    </div>
    <div class="mt-3">
        <h3 class="font-bold text-3xl text-red-500">Bài viết mới nhất</h3>
        <div class="flex flex-wrap flex-row gap-3">
            <div class="mt-4 rounded-md" style="background-color: #fff;;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                <img src="{{ asset('image/baiviet1.jpg') }}" alt="" style="width:300px;">
                <p class="mt-3 text-red-600 font-bold px-3"><a href="">"Less Is More" - Xu Hướng Tối GIản Không Gian Sống</a></p>
                <p class="text-gray-500 px-3">Platon, nhà triết học Hy lạp cổ đại nổi tiếng từng nói: “ Cái đẹp của phong cách, của sự hài hoà, của sự duyên dáng và nhịp nhàng phụ thuộc vào sự đơn giản”.</p>
            </div>
            <div class="mt-4 rounded-md" style="background-color: #fff;;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                <img src="{{ asset('image/baiviet2.jpg') }}" alt="" style="width:300px;">
                <p class="mt-3 text-red-600 font-bold px-3"><a href="">Bí Quyết Để Giữ Căn Bếp Luôn Gọn Gàng</a></p>
                <p class="text-gray-500 px-3">Khu vực bếp là không gian quan trọng cho việc cả gia đình tận hưởng bữa ăn sau một ngày dài và là nơi để các chị em nội trợ chế biến ra những món ăn ngon.</p>
            </div>
            <div class="mt-4 rounded-md" style="background-color: #fff;;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                <img src="{{ asset('image/baiviet3.jpg') }}" alt="" style="width:300px;">
                <p class="mt-3 text-red-600 font-bold px-3"><a href="">Tips Trang Trí Góc Học Tập, Làm Việc Đẹp Và Khoa Học</a></p>
                <p class="text-gray-500 px-3">Những góc học tập, làm việc được bài trí một cách khoa học và thông minh, giúp cho công việc học tập của bạn thuận tiện hơn, mất đi tính thẩm mỹ.</p>
            </div>
            <div class="mt-4 rounded-md" style="background-color: #fff;;font-size: 18px;width:325px;padding: 0 0 16px 0; " >
                <img src="{{ asset('image/baiviet4.jpg') }}" alt="" style="width:300px;">
                <p class="mt-3 text-red-600 font-bold px-3"><a href="">Sự Khác Biệt Giữa Phong Cách Thiết Kế Nội Thất Vintage và Retro</a></p>
                <p class="text-gray-500 px-3">Khi nói đến thiết kế nội thất, hai từ "vintage" và "retro" thường được sử dụng thay thế cho nhau. Tuy nhiên, mặc dù có nhiều điểm chung, hai phong cách </p>
            </div>
           
            
            
            
        </div>
    </div>
</div>
@endsection
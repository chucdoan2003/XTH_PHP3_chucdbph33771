@extends('layout.admin.master')
@section('title')
    Danh sách sản phẩm  
@endsection
@section('link')
    Sản phẩm > Danh sách sản phẩm  
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
    <div class="" style="background-color:#fff;margin: 16px 16px 16px 16px;padding: 16px">
        <a href="{{ route('admin.products.create') }}"><Button style="padding: 8px; background-color: rgb(48, 238, 31); width: 120px; border-radius: 10px;margin-bottom: 12px;">New</Button></a>
        <table class="table-auto w-full "   >
            <head>
                <tr >
                    <th>ID</th>
                    <td>Sku</td>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Price sale</th>

                    <th>Thumb Nail</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Hành động</th>
                </tr>
            </head>
            <tbody >
                @foreach ($data as $item)
                <tr >
                    <td >{{ $item->id }}</td>
                    <td>{{ $item->sku }}</td>
                    <td >{{ $item->name }}</td>
                    <td >{{ $item->price }} VNĐ</td>
                    <td >{{ $item->price_sale }} VNĐ</td>
                    <td style="width:200px; height: 200px;"><img src="{{ Storage::url($item->thumb_nail) }}" alt="" class="object-fit" ></td>
                    <td >{{ $item->category->name }}</td>
                    <td >{{ $item->description }}</td>
                  
                    <td >
                        <a href="{{ route('admin.products.edit',$item->id) }}"><button class="" style="padding: 8px; background-color: rgb(226, 243, 47); width: 60px; border-radius: 10px">Edit</button></a>
                        <form action="{{ route('admin.products.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 8px; background-color: rgb(243, 102, 47); width: 60px; border-radius: 10px;margin: 8px 0 0 0 ;"
                                onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')"
                            >Delete</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
                
               
            </tbody>
        </table>
    </div>   
@endsection
@extends('layout.admin.master')
@section('title')
    List banners
@endsection
@section('link')
   Banners > List Banners
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
        <a href="{{ route('admin.banners.create') }}"><Button style="padding: 8px; background-color: rgb(48, 238, 31); width: 120px; border-radius: 10px;margin-bottom: 12px;">Thêm mới</Button></a>
        <table class="table-auto w-full "   >
            <head>
                <tr >
                    <th>ID</th>
                    <th>Banner</th>
                    <th>Hành động</th>
                </tr>
            </head>
            <tbody >
                @foreach ($data as $item)
                    <tr >
                        <td >{{ $item->id }}</td>
                        <td><img src="{{ Storage::url($item->banner) }}" alt="" style="width: 200px;" class="object-cover"></td>
                        <td >
                            <a href="{{ route('admin.banners.edit', $item->id) }}">
                                <button style="padding: 8px; background-color: rgb(226, 243, 47); width: 60px; border-radius: 10px">Sửa</button>
                            </a>
                            <form action="{{ route('admin.banners.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                 style="padding: 8px; background-color: rgb(243, 102, 47); width: 60px; border-radius: 10px;margin: 8px 0 0 0 ;"
                                  onclick="return confirm('Bạn có muốn xóa danh mục không')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
        </table>
    </div>   
@endsection
@extends('layout.admin.master')
@section('title')
    Orders  
@endsection
@section('link')
    Orders > List orders  
@endsection
@section('content')
<style>
    table {
    border: 1px solid #ccc; /* Đường viền mỏng màu xám */
    width:100%;
}
th{
    padding: 8px 0;
}

th, td {
    border: 1px solid #ccc; /* Đường viền cho ô */
    text-align: center;
    padding:8px 8px;
}
</style>
    <div class="" style="background-color:#fff;margin: 16px 16px 16px 16px;padding: 16px">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>user recept</th>
                    <th>Product</th>
                    <th>Total price</th>
                    <th>Status</th>
                    <th>Payment status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($yourOrders as $items)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>chucdoan</td>
                        <td>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product name</th>
                                        <th>Price</th>
                                        <th>Price_sale</th>
                                        <th>Thumbnail</th>
                                        <th>Material</th>
                                        <th>Color</th>
                                        <th>Quantity</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items['orderItems'] as $item)
                                        <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_price }}</td>
                                        <td>{{ $item->product_price_sale }}</td>
                                        <td><img src="{{ Storage::url($item->product_thumb_nail) }}" alt="" style="width:100px; height: 100px"></td>
                                        <td>{{ $item->variant_material_name }}</td>
                                        <td>{{ $item->variant_color_name }}</td>
                                        <td>{{ $item->quantity	 }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>

                        </td>
                        <td>{{ $items['order']->total_price }} VNĐ</td>
                        <td>{{ $items['order']->order_status }}</td>
                        <td>{{ $items['order']->payment_status }}</td>
                        <td>
                            <a href="{{ route('admin.print', $items['order']->id) }}">In hóa đơn</a>
                            <form action="{{ route('admin.orders.status', $items['order']->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mt-2">
                                    <button class="px-4 py-2 rounded-md " type="submit" style="background-color: rgb(255, 0, 0)" name="status" value="cancel">Cancel</button>
                                </div>
                                <div class="mt-2">
                                    <button class="px-4 py-2 rounded-md " type="submit" style="background-color: rgb(0, 123, 255)" name="status" value="confirmed">Confirmed</button>
                                </div>
                                <div class="mt-2">
                                    <button class="px-4 py-2 rounded-md " type="submit" style="background-color: rgb(0, 255, 132)" name="status" value="delivered">Delivered</button>
                                </div>
                                <div class="mt-2">
                                    <button class="px-4 py-2 rounded-md " type="submit" style="background-color: rgb(212, 255, 0)" name="status" value="shiping">Shiping </button>

                                </div>
                           </form>
                            
                            
                        </td>

                    </tr>
                @endforeach

               
            </tbody>
        </table>
        
    </div>   
@endsection
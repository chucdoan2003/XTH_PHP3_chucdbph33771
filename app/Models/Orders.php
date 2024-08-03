<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'total_price'
    ];

    const ORDER_STATUS=[
        'pending'=>'Chờ xác nhận',
        'confirmed'=>'Đã xác nhận',
        'preparing'=>'Đang chuẩn bị hàng',
        'shiping'=>'Đang giao hàng',
        'delivered'=>'Đã giao',
        'cancel'=>'Hủy'
    ];
    const STATUS_PENDING = 'Pending';

    //payment
    const PAYMENT_STATUS=[
        'paid'=>'Đã thanh toán',
        'unpaid'=>'Chưa thanh toán'
    ];

    const UNPAID = 'unpaid';

    public function orderItems(){
        return $this->hasMany(OrderItems::class);
    }
}

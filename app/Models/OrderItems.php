<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_variants_id',
        'product_name',
        'product_sku',
        'product_price',
        'product_price_sale',
        'product_thumb_nail',
        'variant_material_name',
        'variant_color_name',
        'orders_id',
        'quantity'
    ];
    public function order(){
        return $this->belongsTo(Orders::class);
    }
}

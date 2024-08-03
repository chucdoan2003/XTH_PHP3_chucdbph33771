<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productVariants extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'product_material_id',
        'product_color_id',
        'image',
        'quantity',
        'price'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

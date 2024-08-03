<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable=[
        'carts_id',
        'product_variants_id',
        'quantity'
    ];
    public function cart(){
        return $this->belongsTo(Carts::class);
    }
}

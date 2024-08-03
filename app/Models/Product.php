<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'sku',
        "name",
        "price",
        'price_sale',
        "thumb_nail",
        "description",
        "category_id"
        
    ];
    protected $casts=[
        'isActive'=>'boolean'
    ];
    // protected $casts=[
    //     "status"=>'boolean',
    // ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function variants(){
        return $this->hasMany(productVariants::class);
    }
    public function galleries(){
        return $this->hasMany(productGalleries::class);
    }
}

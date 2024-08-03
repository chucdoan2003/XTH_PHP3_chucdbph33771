<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vourcher extends Model
{
    use HasFactory;
    protected $fillable=[
        'vourcher_code',
        'vourcher_value'
    ];
}

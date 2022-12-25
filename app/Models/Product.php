<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_category',
        'product_price',
        'discount_price',
        'product_quantity',
        'product_description',
        'photo',
        'status'
    ];
}

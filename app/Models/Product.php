<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'stock_quantity',
    ];
}

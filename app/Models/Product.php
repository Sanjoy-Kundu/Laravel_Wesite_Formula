<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    public  $fillable = ["product_name", 'product_type', 'product_category', 'product_price', 'product_brand', 'product_unit', 'product_tag', 'product_description'];
}

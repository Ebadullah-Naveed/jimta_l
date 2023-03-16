<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description','sku','slug','avaliability','product_main_image','color','size','status','category_id','price'
    ];
}

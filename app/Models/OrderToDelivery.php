<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderToDelivery extends Model
{
    use HasFactory;

    protected $table = 'order_to_delivers';
    protected $fillable = [
        'order_id', 'user_id','orderer_id','status','verification_code'
    ];
}

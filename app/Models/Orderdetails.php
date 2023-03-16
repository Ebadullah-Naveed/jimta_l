<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'total','payment_id',"delivery"
    ];

    public function orderItem(){
        return $this->hasMany(OrderItem::class,'id','order_id');
    }

    public function user(){
        return $this->hasOne(User::class,'user_id','id');
    }
}

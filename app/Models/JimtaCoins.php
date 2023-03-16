<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JimtaCoins extends Model
{
    use HasFactory;

    protected $table = 'jimta_coins';

    protected $fillable = [
        'user_id', 'balance'
    ];
}

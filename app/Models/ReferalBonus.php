<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalBonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'referrer_id',
        'bonus_percentage',
        'status'
     ];
}

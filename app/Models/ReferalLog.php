<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user',
        'referal',
        'amount',
        'type',
        'message'
     ];
}

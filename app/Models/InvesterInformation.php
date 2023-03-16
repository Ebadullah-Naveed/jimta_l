<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvesterInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'investment_amount','referal_return','investment_return','status','withdraw_at','end_date'
    ];
}

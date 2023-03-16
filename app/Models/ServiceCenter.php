<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'bussiness_details',
        'bussiness_name',
        'shop_address',
        'location',
        'contact_person',
        'tel_office',
        'mobile',
        'bussiness_licence_number',
        'gov_id',
        'user_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPersentage extends Model
{
    use HasFactory;

    protected $table = 'return_persentage';

    protected $fillable = [
        'id',
        'persentage',
     ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketItems extends Model
{
    protected $fillable = [
        'item_name',
        'item_description',
        'item_qty',
        'item_price',
    ];

}

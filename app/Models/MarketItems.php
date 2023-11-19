<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketItems extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'seller_id',
        'item_image',
        'item_name',
        'item_description',
        'item_qty',
        'item_price',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}

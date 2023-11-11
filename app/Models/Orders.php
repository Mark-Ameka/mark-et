<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MarketItems;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'buyer_id',
        'pending',
        'total_quantity',
        'total_amount'
    ];

    public function items(){
        return $this->hasMany(MarketItems::class);
    }
}

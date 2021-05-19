<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class ShopWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'cvv',
        'card_number',
        "expiry_date",
        "shop_id"
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}

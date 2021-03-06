<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'date_due',
        'quantity',
        "discount",
        "shop_id"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('redeem_date');
    }
}

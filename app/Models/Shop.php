<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'slug',
        'blocked_at',
        'reason',
        'user_id'
    ];

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($shop) {
            foreach ($shop->products()->get() as $product) {
                $product->opinions()->delete();
            }
            $shop->products()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products_history()
    {
        return $this->hasMany(ProductHistory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function wallet()
    {
        return $this->hasOne(ShopWallet::class);
    }
}

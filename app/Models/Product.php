<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'slug',
        'stock',
        'shop_id',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();
        Product::observe(ProductObserver::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('price', 'quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products_history()
    {
        return $this->hasMany(ProductHistory::class);
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}

<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductHistory;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        ProductHistory::create([
            'action' => 'insert', 'id' => $product->id, 'name' => $product->name, 'description' => $product->description, 'price' => $product->price, 'stock' => $product->stock,
            'image' => $product->image, 'slug' => $product->slug, 'shop_id' => $product->shop->id, 'user_id' => $product->user_id
        ]);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        ProductHistory::create([
            'action' => 'updated', 'id' => $product->id, 'name' => $product->name, 'description' => $product->description, 'price' => $product->price, 'stock' => $product->stock,
            'image' => $product->image, 'slug' => $product->slug, 'shop_id' => $product->shop->id, 'user_id' => $product->user_id
        ]);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        ProductHistory::create([
            'action' => 'deleted', 'id' => $product->id, 'name' => $product->name, 'description' => $product->description, 'price' => $product->price, 'stock' => $product->stock,
            'image' => $product->image, 'slug' => $product->slug, 'shop_id' => $product->shop->id, 'user_id' => $product->user_id
        ]);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        ProductHistory::create([
            'action' => 'restored', 'id' => $product->id, 'name' => $product->name, 'description' => $product->description, 'price' => $product->price, 'stock' => $product->stock,
            'image' => $product->image, 'slug' => $product->slug, 'shop_id' => $product->shop->id, 'user_id' => $product->user_id
        ]);
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        ProductHistory::create([
            'action' => 'forceDeleted', 'id' => $product->id, 'name' => $product->name, 'description' => $product->description, 'price' => $product->price, 'stock' => $product->stock,
            'image' => $product->image, 'slug' => $product->slug, 'shop_id' => $product->shop->id, 'user_id' => $product->user_id
        ]);
    }
}

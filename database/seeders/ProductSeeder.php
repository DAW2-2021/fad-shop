<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product = new Product();
        $product->name = "Alfombrilla";
        $product->description = "Alfombrilla para colocar el mouse.";
        $product->price = 14.99;
        $product->image = "products/alfombrilla_tecnologia.png";
        $product->slug = "alfombrilla";
        $product->stock = 10;
        $product->shop_id = 6;
        $product->user_id = 7;
        $product->save();
        $product->categories()->attach(1);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop = new Shop();
        $shop->user_id = 2;
        $shop->name = "Seller Shop";
        $shop->description = "La tienda del seller engloba todo tipo de productos deportivos";
        $shop->logo = "611111111";
        $shop->role_id = 1;
        $shop->save();
    }
}

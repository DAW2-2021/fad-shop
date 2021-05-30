<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;

class ShopSeeder extends Seeder
{
    public function run()
    {
        $shop = new Shop();
        $shop->user_id = 2;
        $shop->name = "BeautyShirts";
        $shop->description = "La tienda que engloba todo tipo de productos de moda, camisetas principalmente.";
        $shop->logo = "/logos/BeautyShirts.png";
        $shop->slug = "beautyshirts";
        $shop->save();

        $shop = new Shop();
        $shop->user_id = 3;
        $shop->name = "Delicious";
        $shop->description = "La tienda que engloba todo tipo de productos de comida.";
        $shop->logo = "/logos/Delicious.png";
        $shop->slug = "delicious";
        $shop->save();

        $shop = new Shop();
        $shop->user_id = 4;
        $shop->name = "FantasyLand";
        $shop->description = "La tienda que engloba todo tipo de juguetes.";
        $shop->logo = "/logos/fantasyLand.png";
        $shop->slug = "fantasyland";
        $shop->save();

        $shop = new Shop();
        $shop->user_id = 5;
        $shop->name = "Nukids";
        $shop->description = "La tienda que engloba todo tipo de productos infantiles.";
        $shop->logo = "/logos/nukids.png";
        $shop->slug = "nukids";
        $shop->save();

        $shop = new Shop();
        $shop->user_id = 6;
        $shop->name = "Tecnonautas";
        $shop->description = "La tienda que engloba todo tipo de productos tecnológicos.";
        $shop->logo = "/logos/tecnonautas.png";
        $shop->slug = "tecnonautas";
        $shop->save();

        $shop = new Shop();
        $shop->user_id = 7;
        $shop->name = "TheGames";
        $shop->description = "La tienda que engloba todo tipo de videojuegos.";
        $shop->logo = "/logos/TheGames.png";
        $shop->slug = "thegames";
        $shop->save();
    }
}

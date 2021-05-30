<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petition;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PetitionSeeder extends Seeder
{
    public function run()
    {
        $petition = new Petition();
        $petition->user_id = 2;
        $petition->shop_name = "beautyShirts";
        $petition->shop_description = "La tienda que engloba todo tipo de productos de moda, camisetas principalmente.";
        $petition->shop_logo = "/logos/BeautyShirts.png";
        $petition->dni_front = "/dnis_front/AnversoDni.jpg";
        $petition->dni_back = "/dnis_back/ReversoDni.jpg";
        $petition->status = "accepted";
        $petition->save();

        $petition = new Petition();
        $petition->user_id = 3;
        $petition->shop_name = "delicious";
        $petition->shop_description = "La tienda que engloba todo tipo de productos de comida.";
        $petition->shop_logo = "/logos/Delicious.png";
        $petition->dni_front = "/dnis_front/AnversoDni.jpg";
        $petition->dni_back = "/dnis_back/ReversoDni.jpg";
        $petition->status = "accepted";
        $petition->save();

        $petition = new Petition();
        $petition->user_id = 4;
        $petition->shop_name = "fantasyLand";
        $petition->shop_description = "La tienda que engloba todo tipo de juguetes.";
        $petition->shop_logo = "/logos/fantasyLand.png";
        $petition->dni_front = "/dnis_front/AnversoDni.jpg";
        $petition->dni_back = "/dnis_back/ReversoDni.jpg";
        $petition->status = "accepted";
        $petition->save();

        $petition = new Petition();
        $petition->user_id = 5;
        $petition->shop_name = "nukids";
        $petition->shop_description = "La tienda que engloba todo tipo de productos infantiles.";
        $petition->shop_logo = "/logos/nukids.png";
        $petition->dni_front = "/dnis_front/AnversoDni.jpg";
        $petition->dni_back = "/dnis_back/ReversoDni.jpg";
        $petition->status = "accepted";
        $petition->save();

        $petition = new Petition();
        $petition->user_id = 6;
        $petition->shop_name = "tecnonautas";
        $petition->shop_description = "La tienda que engloba todo tipo de productos tecnológicos.";
        $petition->shop_logo = "/logos/tecnonautas.png";
        $petition->dni_front = "/dnis_front/AnversoDni.jpg";
        $petition->dni_back = "/dnis_back/ReversoDni.jpg";
        $petition->status = "accepted";
        $petition->save();

        $petition = new Petition();
        $petition->user_id = 7;
        $petition->shop_name = "theGames";
        $petition->shop_description = "La tienda que engloba todo tipo de videojuegos.";
        $petition->shop_logo = "/logos/TheGames.png";
        $petition->dni_front = "/dnis_front/AnversoDni.jpg";
        $petition->dni_back = "/dnis_back/ReversoDni.jpg";
        $petition->status = "accepted";
        $petition->save();
    }
}

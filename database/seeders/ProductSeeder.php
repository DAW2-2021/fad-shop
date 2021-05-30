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
        $product->shop_id = 5;
        $product->user_id = 6;
        $product->save();
        $product->categories()->attach(1);

        $product = new Product();
        $product->name = "Echo dot";
        $product->description = "Echo dot inteligente para el hogar.";
        $product->price = 59.99;
        $product->image = "products/echo_dot_tecnologia.png";
        $product->slug = "echo-dot";
        $product->stock = 10;
        $product->shop_id = 5;
        $product->user_id = 6;
        $product->save();
        $product->categories()->attach(1);

        $product = new Product();
        $product->name = "Fire tv";
        $product->description = "Echo dot inteligente para el hogar.";
        $product->price = 39.99;
        $product->image = "products/fire_tv_tecno.png";
        $product->slug = "fire-tv";
        $product->stock = 10;
        $product->shop_id = 5;
        $product->user_id = 6;
        $product->save();
        $product->categories()->attach(1);

        $product = new Product();
        $product->name = "Funda";
        $product->description = "Funda para disco duro externo.";
        $product->price = 39.99;
        $product->image = "products/funda_tecnologia.png";
        $product->slug = "funda";
        $product->stock = 10;
        $product->shop_id = 5;
        $product->user_id = 6;
        $product->save();
        $product->categories()->attach(1);

        $product = new Product();
        $product->name = "Ratón";
        $product->description = "Ratón para gaming básico.";
        $product->price = 24.99;
        $product->image = "products/ratón_tecnologia.png";
        $product->slug = "raton";
        $product->stock = 10;
        $product->shop_id = 5;
        $product->user_id = 6;
        $product->save();
        $product->categories()->attach(1);

        $product = new Product();
        $product->name = "Tablet";
        $product->description = "Tablet para visualizar todo tipo de películas a la máxima resolución.";
        $product->price = 203.86;
        $product->image = "products/tablet_tecnologia.png";
        $product->slug = "tablet";
        $product->stock = 10;
        $product->shop_id = 5;
        $product->user_id = 6;
        $product->save();
        $product->categories()->attach(1);

        $product = new Product();
        $product->name = "Babero";
        $product->description = "Babero infantil con colores atractivos.";
        $product->price = 7.33;
        $product->image = "products/babero_bebé.png";
        $product->slug = "babero";
        $product->stock = 10;
        $product->shop_id = 4;
        $product->user_id = 5;
        $product->save();
        $product->categories()->attach(6);

        $product = new Product();
        $product->name = "Silla";
        $product->description = "Silla infantil con agarradores fuertes y comfortables.";
        $product->price = 57.99;
        $product->image = "products/sillita_bebé.png";
        $product->slug = "silla";
        $product->stock = 10;
        $product->shop_id = 4;
        $product->user_id = 5;
        $product->save();
        $product->categories()->attach(6);

        $product = new Product();
        $product->name = "Chupete";
        $product->description = "Chupete infantil con agarradores fuertes y comfortables.";
        $product->price = 5.95;
        $product->image = "products/xupete_moda_bebé.png";
        $product->slug = "chupete";
        $product->stock = 10;
        $product->shop_id = 4;
        $product->user_id = 5;
        $product->save();
        $product->categories()->attach([6, 2]);

        $product = new Product();
        $product->name = "Carrito";
        $product->description = "Carrito infantil con múltiples comparticiones.";
        $product->price = 70;
        $product->image = "products/carrito_bebé_moda.png";
        $product->slug = "carrito";
        $product->stock = 10;
        $product->shop_id = 4;
        $product->user_id = 5;
        $product->save();
        $product->categories()->attach([6, 2]);

        $product = new Product();
        $product->name = "Call of duty";
        $product->description = "Videojuego call of duty black ops cold war.";
        $product->price = 40;
        $product->image = "products/Call_of_duty_videojuego.png";
        $product->slug = "call-of-duty";
        $product->stock = 10;
        $product->shop_id = 6;
        $product->user_id = 7;
        $product->save();
        $product->categories()->attach(4);

        $product = new Product();
        $product->name = "Pokemon";
        $product->description = "Videojuego de pokemon snap.";
        $product->price = 25.35;
        $product->image = "products/pokemon_videojuego.png";
        $product->slug = "pokemon";
        $product->stock = 10;
        $product->shop_id = 6;
        $product->user_id = 7;
        $product->save();
        $product->categories()->attach(4);

        $product = new Product();
        $product->name = "Village";
        $product->description = "Videojuego Village resident evil.";
        $product->price = 37.50;
        $product->image = "products/village_juegos.png";
        $product->slug = "village";
        $product->stock = 10;
        $product->shop_id = 6;
        $product->user_id = 7;
        $product->save();
        $product->categories()->attach(4);

        $product = new Product();
        $product->name = "Camiseta amarilla";
        $product->description = "Camiseta básica de color amarillo.";
        $product->price = 12;
        $product->image = "products/camiseta_moda.png";
        $product->slug = "camiseta-amarilla";
        $product->stock = 10;
        $product->shop_id = 1;
        $product->user_id = 2;
        $product->save();
        $product->categories()->attach(2);

        $product = new Product();
        $product->name = "Camiseta levis";
        $product->description = "Camiseta de la marca levis color azul.";
        $product->price = 14;
        $product->image = "products/camiseta_levi's.png";
        $product->slug = "camiseta-levis";
        $product->stock = 10;
        $product->shop_id = 1;
        $product->user_id = 2;
        $product->save();
        $product->categories()->attach(2);

        $product = new Product();
        $product->name = "Camiseta boxeo";
        $product->description = "Camiseta negra con dibujos de boxeo.";
        $product->price = 13;
        $product->image = "products/camisetaboxeo_moda.png";
        $product->slug = "camiseta-boxeo";
        $product->stock = 10;
        $product->shop_id = 1;
        $product->user_id = 2;
        $product->save();
        $product->categories()->attach(2);

        $product = new Product();
        $product->name = "Taper camping";
        $product->description = "Taper especial para ir de acampada.";
        $product->price = 29.99;
        $product->image = "products/comida.png";
        $product->slug = "taper-camping";
        $product->stock = 10;
        $product->shop_id = 2;
        $product->user_id = 3;
        $product->save();
        $product->categories()->attach(3);

        $product = new Product();
        $product->name = "Fuet";
        $product->description = "Pack de dos fuets espetec.";
        $product->price = 6.99;
        $product->image = "products/fuet.png";
        $product->slug = "fuet";
        $product->stock = 10;
        $product->shop_id = 2;
        $product->user_id = 3;
        $product->save();
        $product->categories()->attach(3);

        $product = new Product();
        $product->name = "Patatas lays";
        $product->description = "Patatas de bolsa marca Lay's.";
        $product->price = 1.25;
        $product->image = "products/lays_comida.png";
        $product->slug = "patatas-lays";
        $product->stock = 10;
        $product->shop_id = 2;
        $product->user_id = 3;
        $product->save();
        $product->categories()->attach(3);

        $product = new Product();
        $product->name = "Pizza";
        $product->description = "Pizza de tomates cherry.";
        $product->price = 1.25;
        $product->image = "products/pizza_comida.png";
        $product->slug = "pizza";
        $product->stock = 10;
        $product->shop_id = 2;
        $product->user_id = 3;
        $product->save();
        $product->categories()->attach(3);

        $product = new Product();
        $product->name = "Yogur";
        $product->description = "Yogur de limón marca dia.";
        $product->price = 4.99;
        $product->image = "products/yogur_comida.png";
        $product->slug = "yogur";
        $product->stock = 10;
        $product->shop_id = 2;
        $product->user_id = 3;
        $product->save();
        $product->categories()->attach(3);

        $product = new Product();
        $product->name = "Tracers";
        $product->description = "Juguete de coches tracers.";
        $product->price = 6.99;
        $product->image = "products/juguetes.png";
        $product->slug = "tracers";
        $product->stock = 10;
        $product->shop_id = 3;
        $product->user_id = 4;
        $product->save();
        $product->categories()->attach(5);

        $product = new Product();
        $product->name = "Llaves";
        $product->description = "Juguete de llaves para infantiles.";
        $product->price = 3.50;
        $product->image = "products/llaves_juguetes.png";
        $product->slug = "llaves";
        $product->stock = 10;
        $product->shop_id = 3;
        $product->user_id = 4;
        $product->save();
        $product->categories()->attach(5);

        $product = new Product();
        $product->name = "Patito";
        $product->description = "Patito para bañera, juguete infantil.";
        $product->price = 4;
        $product->image = "products/patito_juguetes.png";
        $product->slug = "patito";
        $product->stock = 10;
        $product->shop_id = 3;
        $product->user_id = 4;
        $product->save();
        $product->categories()->attach(5);

        $product = new Product();
        $product->name = "Serpiente";
        $product->description = "Serpiente, crea formas y disfruta.";
        $product->price = 5.95;
        $product->image = "products/serpiente_juguete.png";
        $product->slug = "serpiente";
        $product->stock = 10;
        $product->shop_id = 3;
        $product->user_id = 4;
        $product->save();
        $product->categories()->attach(5);
    }
}

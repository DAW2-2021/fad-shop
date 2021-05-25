<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Tecnología";
        $category->slug = "tecnologia";
        $category->icon = "fas fa-microchip";
        $category->save();

        $category = new Category();
        $category->name = "Moda";
        $category->slug = "moda";
        $category->icon = "fas fa-tshirt";
        $category->save();

        $category = new Category();
        $category->name = "Comida";
        $category->slug = "comida";
        $category->icon = "fas fa-utensils";
        $category->save();

        $category = new Category();
        $category->name = "Videojuegos";
        $category->slug = "videojuegos";
        $category->icon = "fas fa-gamepad";
        $category->save();

        $category = new Category();
        $category->name = "Juguetes";
        $category->slug = "juguetes";
        $category->icon = "fas fa-puzzle-piece";
        $category->save();

        $category = new Category();
        $category->name = "Bebé";
        $category->slug = "bebe";
        $category->icon = "fas fa-baby";
        $category->save();

        $category = new Category();
        $category->name = "Hogar";
        $category->slug = "hogar";
        $category->icon = "fas fa-home";
        $category->save();

        $category = new Category();
        $category->name = "Jardín";
        $category->slug = "jardin";
        $category->icon = "fas fa-seedling";
        $category->save();

        $category = new Category();
        $category->name = "Bricolaje";
        $category->slug = "bricolaje";
        $category->icon = "fas fa-hammer";
        $category->save();

        $category = new Category();
        $category->name = "Mascotas";
        $category->slug = "mascotas";
        $category->icon = "fas fa-dog";
        $category->save();

        $category = new Category();
        $category->name = "Coche";
        $category->slug = "coche";
        $category->icon = "fas fa-car";
        $category->save();

        $category = new Category();
        $category->name = "Moto";
        $category->slug = "moto";
        $category->icon = "fas fa-motorcycle";
        $category->save();

        $category = new Category();
        $category->name = "Industria";
        $category->slug = "industria";
        $category->icon = "fas fa-industry";
        $category->save();

        $category = new Category();
        $category->name = "Empresa";
        $category->slug = "empresa";
        $category->icon = "fas fa-industry";
        $category->save();

        $category = new Category();
        $category->name = "Ciencias";
        $category->slug = "ciencias";
        $category->icon = "fas fa-flask";
        $category->save();

        $category = new Category();
        $category->name = "Domótica";
        $category->slug = "domotica";
        $category->icon = "fas fa-laptop-house";
        $category->save();

        $category = new Category();
        $category->name = "Libros";
        $category->slug = "libros";
        $category->icon = "fas fa-book";
        $category->save();

        $category = new Category();
        $category->name = "Cine";
        $category->slug = "cine";
        $category->icon = "fas fa-film";
        $category->save();

        $category = new Category();
        $category->name = "TV";
        $category->slug = "tv";
        $category->icon = "fas fa-tv";
        $category->save();

        $category = new Category();
        $category->name = "Música";
        $category->slug = "musica";
        $category->icon = "fas fa-music";
        $category->save();
    }
}

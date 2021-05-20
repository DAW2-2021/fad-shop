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
        $category->icon = "fas fa-microchip";
        $category->save();

        $category = new Category();
        $category->name = "Moda";
        $category->icon = "fas fa-tshirt";
        $category->save();

        $category = new Category();
        $category->name = "Comida";
        $category->icon = "fas fa-utensils";
        $category->save();

        $category = new Category();
        $category->name = "Videojuegos";
        $category->icon = "fas fa-gamepad";
        $category->save();

        $category = new Category();
        $category->name = "Juguetes";
        $category->icon = "fas fa-puzzle-piece";
        $category->save();

        $category = new Category();
        $category->name = "Bebé";
        $category->icon = "fas fa-baby";
        $category->save();

        $category = new Category();
        $category->name = "Hogar";
        $category->icon = "fas fa-home";
        $category->save();

        $category = new Category();
        $category->name = "Jardín";
        $category->icon = "fas fa-seedling";
        $category->save();

        $category = new Category();
        $category->name = "Bricolaje";
        $category->icon = "fas fa-hammer";
        $category->save();

        $category = new Category();
        $category->name = "Mascotas";
        $category->icon = "fas fa-dog";
        $category->save();

        $category = new Category();
        $category->name = "Coche";
        $category->icon = "fas fa-car";
        $category->save();

        $category = new Category();
        $category->name = "Moto";
        $category->icon = "fas fa-motorcycle";
        $category->save();

        $category = new Category();
        $category->name = "Industria";
        $category->icon = "fas fa-industry";
        $category->save();

        $category = new Category();
        $category->name = "Empresa";
        $category->icon = "fas fa-industry";
        $category->save();

        $category = new Category();
        $category->name = "Ciencias";
        $category->icon = "fas fa-flask";
        $category->save();

        $category = new Category();
        $category->name = "Domótica";
        $category->icon = "fas fa-laptop-house";
        $category->save();

        $category = new Category();
        $category->name = "Libros";
        $category->icon = "fas fa-book";
        $category->save();

        $category = new Category();
        $category->name = "Cine";
        $category->icon = "fas fa-film";
        $category->save();

        $category = new Category();
        $category->name = "TV";
        $category->icon = "fas fa-tv";
        $category->save();

        $category = new Category();
        $category->name = "Música";
        $category->icon = "fas fa-music";
        $category->save();
    }
}

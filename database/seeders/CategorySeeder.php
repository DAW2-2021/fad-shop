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
        $category->icon = "<i class='fas fa-microchip'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Moda";
        $category->icon = "<i class='fas fa-tshirt'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Comida";
        $category->icon = "<i class='fas fa-utensils'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Videojuegos";
        $category->icon = "<i class='fas fa-gamepad'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Juguetes y bebé";
        $category->icon = "<i class='fas fa-puzzle-piece'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Hogar, jardín, bricolaje, mascotas";
        $category->icon = "<i class='fas fa-home'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Coche y moto";
        $category->icon = "<i class='fas fa-car'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Industria, empresa y ciencias";
        $category->icon = "<i class='fas fa-industry'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Hogar digital";
        $category->icon = "<i class='fas fa-laptop-house'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Libros";
        $category->icon = "<i class='fas fa-book'></i>";
        $category->save();

        $category = new Category();
        $category->name = "Cine, TV, Música";
        $category->icon = "<i class='fas fa-tv'></i>";
        $category->save();
    }
}

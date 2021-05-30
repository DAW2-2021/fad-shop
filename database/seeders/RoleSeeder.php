<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = "admin";
        $role->description = "Controla todo";
        $role->save();
        $role = new Role();
        $role->name = "seller";
        $role->description = "Vende todo";
        $role->save();
        $role = new Role();
        $role->name = "user";
        $role->description = "Compra todo";
        $role->save();
    }
}

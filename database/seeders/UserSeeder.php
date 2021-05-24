<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("admin");
        $user->phone = "611111111";
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->username = "seller";
        $user->email = "seller@gmail.com";
        $user->password = Hash::make("seller");
        $user->phone = "622222222";
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->username = "user";
        $user->email = "user@gmail.com";
        $user->password = Hash::make("user");
        $user->phone = "633333333";
        $user->role_id = 3;
        $user->save();
    }
}

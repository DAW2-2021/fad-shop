<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
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
        $user->username = "beautyShirts";
        $user->email = "beautyShirts@gmail.com";
        $user->password = Hash::make("beautyShirts");
        $user->phone = "644444444";
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->username = "delicious";
        $user->email = "delicious@gmail.com";
        $user->password = Hash::make("delicious");
        $user->phone = "655555555";
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->username = "fantasyLand";
        $user->email = "fantasyLand@gmail.com";
        $user->password = Hash::make("fantasyLand");
        $user->phone = "666666666";
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->username = "nukids";
        $user->email = "nukids@gmail.com";
        $user->password = Hash::make("nukids");
        $user->phone = "666666667";
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->username = "tecnonautas";
        $user->email = "tecnonautas@gmail.com";
        $user->password = Hash::make("tecnonautas");
        $user->phone = "666666668";
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->username = "theGames";
        $user->email = "theGames@gmail.com";
        $user->password = Hash::make("theGames");
        $user->phone = "666666669";
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

<?php

use Illuminate\Database\Migrations\Migration;

class tr_Product_Delete extends Migration
{

    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER `tr_product_delete` BEFORE DELETE
        ON `products`
        FOR EACH row
        INSERT INTO history_products
                    (action,
                    date,
                    system_user,
                    user_id,
                    product_id,
                    name,
                    description,
                    price,
                    image,
                    shop_id,
                    stock,
                    created_at,
                    updated_at)
        VALUES      ('DELETED',
                    Now(),
                    System_user(),
                    old.user_id,
                    old.id,
                    old.name,
                    old.description,
                    old.price,
                    old.image,
                    old.shop_id,
                    old.stock,
                    old.created_at,
                    old.updated_at);
        ");
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_product_delete`');
    }
}

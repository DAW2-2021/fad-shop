<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ProductObserver;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Product::observe(ProductObserver::class);

        Validator::extend('min_length', function ($attribute, $value, $parameters) {
            //Tabulacion a espacio
            $value = preg_replace('/\t+/', ' ', $value);
            //Tabs a espacio
            $value = preg_replace('/\n\r+/', ' ', $value);
            //Espacios a espacio
            $value = preg_replace('/\s+/', ' ',  $value);
            strlen($value);
            return strlen($value) >= $parameters[0];
        });

        Validator::extend('max_length', function ($attribute, $value, $parameters) {
            //Tabulacion a espacio
            $value = preg_replace('/\t+/', ' ', $value);
            //Tabs a espacio
            $value = preg_replace('/\n\r+/', ' ', $value);
            //Espacios a espacio
            $value = preg_replace('/\s+/', ' ',  $value);
            strlen($value);
            return strlen($value) <= $parameters[0];
        });

        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });
    }
}

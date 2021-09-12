<?php

namespace App\Providers;

use Dotenv\Validator;
use Illuminate\Support\ServiceProvider;

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
        //
        \Illuminate\Support\Facades\Validator::extend('filter',function ($attribute,$value,$params)
        {
            foreach ((array)$params as $word) {
                if (stripos($value, $word) !== false) {
                    return false;
                }

            }
            return true;
        },'In-Valid');


    }
}

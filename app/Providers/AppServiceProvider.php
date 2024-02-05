<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Socialmedia;
use App\Models\Commission;
use App\Models\Liquidity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
     public function boot(Guard $guard)
     {
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/^[\p{L}\s]+$/u', $value); 
        });

        Validator::extend('only_numbers', function ($attribute, $value) {
            return preg_match('/^[0-9]+$/u', $value);
        });

        Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
        $min_field = $parameters[0];
        $data = $validator->getData();
        $min_value = $data[$min_field];
        return $value > $min_value;
        });   

        Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
        return str_replace(':field', $parameters[0], 'Max amount is too low');
        });


        View::composer('*', function($view) use($guard) {

            $socialMedia  = Socialmedia::where('id', 1)->first();
            $coin_details = Commission::index();

            $view->with('socialMedia', $socialMedia)->with('coin_details', $coin_details);

        });

        Schema::defaultStringLength(191);

    }
}

<?php

namespace App\Providers;

use App\App;
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['master', 'show'], function($view)
        {
            $view->with('appData', App::first());
        });

        Validator::extend('uri', function($attribute, $value, $parameters, $validator)
        {
            $pattern = '/(?:https?:\/\/)?(?:[a-zA-Z0-9.-]+?\.(?:[a-zA-Z])|\d+\.\d+\.\d+\.\d+)/';

            $file_headers = @get_headers($value);

             return (preg_match($pattern, $value) && $file_headers[0] != 'HTTP/1.1 404 Not Found');
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

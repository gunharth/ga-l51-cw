<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Medium;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*view()->composer('partials.mediumheader', function($view) {
            $currentRoute = \Route::current();
$params = $currentRoute->parameters();

dd($params);
            $view->with('medium', Medium::findBySlug($params['medium']));
        });*/
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

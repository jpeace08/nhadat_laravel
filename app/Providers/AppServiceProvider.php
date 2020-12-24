<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\View;
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
        $categories = Category::all();
        $locations = Location::all();
        View::share('categories',$categories);
        View::share('locations',$locations);
    }
}

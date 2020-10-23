<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
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
        \View::share('mainCategories', Category::where('parent_id', 0)->get());
        \View::share('categories', Category::where('parent_id', '!=', '0')->get());
//        \View::share('user',User::where('is_admin','==','1'))->get();
    }
}

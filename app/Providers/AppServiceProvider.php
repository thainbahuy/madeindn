<?php

namespace App\Providers;

use App\Models\Web\Category;
use App\Models\Web\CoWorking;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        View::Share('getAllCoworking',CoWorking::select('id','name','jp_name')->get());
        View::Share('getAllCategories',Category::select('id','name','jp_name')->get());
        Schema::defaultStringLength(191);
    }
}

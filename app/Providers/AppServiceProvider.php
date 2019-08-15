<?php

namespace App\Providers;

use App\Models\Web\About;
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
        View::Share('getAllCoworking',CoWorking::select('id','name','jp_name')->orderByRaw('ISNULL(position), position ASC')->orderBy('id','DESC')->get());
        View::Share('listCategory',Category::select('id','name','jp_name','position','created_at')->orderByRaw('ISNULL(position), position ASC')->orderBy('id','DESC')->get());
        View::Share('listAllAbout',About::orderByRaw('ISNULL(position), position ASC')->orderBy('id','DESC')->get());
        Schema::defaultStringLength(191);
    }
}

<?php

namespace App\Providers;

use App\Http\Controllers\ViewComposers\CartComposer;
use App\Http\ViewComposers\CategoriesComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['layouts.front.app', 'front.categories.sidebar-category', 'layouts.front.category-nav'],
            CategoriesComposer::class);

        view()->composer(
            'layouts.front.app',
            CartComposer::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

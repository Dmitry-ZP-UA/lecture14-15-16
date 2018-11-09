<?php

namespace App\Providers;

use App\Services\ConfigUploader\ConfigUploaderInterface;
use App\Services\ConfigUploader\LaravelConfigUploader;
use App\Services\Container\Container;
use App\Services\Container\ContainerInterface;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConfigUploaderInterface::class, LaravelConfigUploader::class);

        $this->app->bind(ContainerInterface::class, Container::class);

    }
}

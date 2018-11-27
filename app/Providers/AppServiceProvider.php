<?php

namespace App\Providers;

use App\Services\ConfigUploader\ConfigUploaderInterface;
use App\Services\ConfigUploader\LaravelConfigUploader;
use App\Services\Container\Container;
use App\Services\Container\ContainerInterface;
use App\Services\Searcher\Elastic;
use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    const HOST_ELASTIC = ['elasticsearch:9200'];

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
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);


        $this->app->bind(ConfigUploaderInterface::class, LaravelConfigUploader::class);

        $this->app->bind(ContainerInterface::class, Container::class);

        $this->app->bind(Elastic::class, function ($app) {
            return new Elastic(
                ClientBuilder::create()
                    ->setHosts(self::HOST_ELASTIC)
                    ->build()
            );
        });
    }
}

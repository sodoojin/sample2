<?php

namespace App\Providers;

use Core\Repositories\ArticleRepository;
use Core\Repositories\ArticleRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticleRepository::class, ArticleRepositoryEloquent::class);
    }
}

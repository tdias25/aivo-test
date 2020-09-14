<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Repositories\Contracts\VideoRepositoryContract',
            'App\Repositories\YoutubeApiRepository'
        );

        $this->app->bind(
            'App\Services\Contracts\VideoSearchServiceContract',
            'App\Services\VideoSearchService'
        );

        $this->app->bind(
            'App\Helpers\Transformers\VideoResponseTransformer',
            'App\Helpers\Transformers\YoutubeApiResponseTransformer'
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

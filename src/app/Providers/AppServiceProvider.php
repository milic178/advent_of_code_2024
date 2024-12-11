<?php

namespace App\Providers;

use App\Services\AdventOfCodeList;
use Illuminate\Support\ServiceProvider;
use App\Services\DataDay2;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(AdventOfCodeList::class, function ($app) {
            // You can optionally pass default data
            return new AdventOfCodeList([
                // Predefined default data (if needed)
            ]);
        });
        $this->app->singleton(DataDay2::class, function ($app) {
            // You can optionally pass default data
            return new DataDay2([
                // Predefined default data (if needed)
            ]);
        });


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Services\AdventOfCodeList;
use Illuminate\Support\ServiceProvider;


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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

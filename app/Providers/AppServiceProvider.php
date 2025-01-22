<?php

namespace App\Providers;

use App\Models\MainConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $config_data = MainConfig::where( 'id', 1 )->first();
        view()->share( 'global_config_data', $config_data );
    }
}

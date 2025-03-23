<?php

namespace App\Providers;

use Domain\Integrations\UVIJewelleries\Services\JewelleryService;
use Domain\Integrations\UVIJewelleries\UVIJewelleryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            abstract: UVIJewelleryInterface::class,
            concrete: fn(): UVIJewelleryInterface => new JewelleryService(
                token: config('services.jewellery.token'),
            )
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

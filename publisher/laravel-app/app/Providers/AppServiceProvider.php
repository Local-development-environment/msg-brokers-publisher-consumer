<?php

namespace App\Providers;

use Domain\Integrations\UVIJewelleries\Services\JewelleryService;
use Domain\Integrations\UVIJewelleries\UVIJewelleryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Policies\GrownStonePolicy;

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
        Gate::policy(GrownStone::class, GrownStonePolicy::class);

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $repositories = $this->getRepositories();

        foreach ($repositories as $repository) {
            if (isset($repository['cache'])) {
//                dd($repository['cache']);
                $this->app->bind($repository['interface'], $repository['cache']);
                $this->app
                    ->when($repository['cache'])
                    ->needs($repository['interface'])
                    ->give($repository['implementation']);
            } else {
                $this->app->bind($repository['interface'], $repository['implementation']);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    private function getRepositories(): array
    {
        return config('repositories');
    }
}

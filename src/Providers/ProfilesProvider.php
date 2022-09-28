<?php

namespace Jclavo\Profiles\Providers;

use Illuminate\Support\ServiceProvider;

class ProfilesProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
<?php

namespace CoreCave\Laratrans;

use Illuminate\Support\ServiceProvider;

/**
 * ContactServiceProvider class
 */
class LaratransServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** Load laratrans migrations */
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        /** Load laratrans routes */
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        /** Publish models, migrations, factories and seeders */
        $this->publishes([
            __DIR__ . '/database/factories' => base_path('database/factories'),
            __DIR__ . '/database/migrations' => base_path('database/migrations'),
            __DIR__ . '/database/seeds' => base_path('database/seeds'),
            __DIR__ . '/database/modles' => base_path('app'),
        ], 'laratrans');
    }

    public function register()
    {
    }
}

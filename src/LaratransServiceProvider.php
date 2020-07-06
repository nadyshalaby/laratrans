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
    }

    public function register()
    {
    }
}

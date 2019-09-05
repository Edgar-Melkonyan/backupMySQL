<?php

namespace EdgarMelkonyan\BackupDatabase;

use Illuminate\Support\ServiceProvider;

class BackupDatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('EdgarMelkonyan\BackupDatabase\BackupDatabase');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

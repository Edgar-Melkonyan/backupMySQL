<?php

namespace Edgar\BackupDatabase;

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
        $this->app->make('Edgar\BackupDatabase\BackupDatabase');
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

<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Repositories\AuthRepository;
use App\Interfaces\CetagoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CetagoryRepository;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Auth
        $this->app->bind(AuthInterface::class,AuthRepository::class);    
        // Cetagory
        $this->app->bind(CetagoryInterface::class,CetagoryRepository::class);
  
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

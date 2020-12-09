<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider; 
use App\Repositories\UserRepository;
use App\Repositories\RegisterController;
// use App\Repositories\UserInterface;

class RepositoryServiceProvider extends ServiceProvider{


    public function register()
    {
        // $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(NurseController::class, NurseRepository::class);
        $this->app->bind(RegisterController::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
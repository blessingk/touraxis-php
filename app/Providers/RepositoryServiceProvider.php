<?php

namespace App\Providers;

use App\Contracts\TaskRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class , TaskRepository::class);
    }
}

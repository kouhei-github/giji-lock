<?php

namespace App\Providers;

use App\Repositories\GroupRepository;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\UseCases\DeleteUserUseCase;
use App\UseCases\GetGroupUseCase;
use App\UseCases\GetUserUseCase;
use App\UseCases\Interfaces\DeleteUserUseCaseInterface;
use App\UseCases\Interfaces\GetGroupUseCaseInterface;
use App\UseCases\Interfaces\GetUserUseCaseInterface;
use App\UseCases\Interfaces\PostUserUseCaseInterface;
use App\UseCases\Interfaces\UpdateUserUseCaseInterface;
use App\UseCases\PostUserUseCase;
use App\UseCases\UpdateUserUseCase;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            GetUserUseCaseInterface::class,
            GetUserUseCase::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            PostUserUseCaseInterface::class,
            PostUserUseCase::class
        );

        $this->app->bind(
            UpdateUserUseCaseInterface::class,
            UpdateUserUseCase::class
        );

        $this->app->bind(
            DeleteUserUseCaseInterface::class,
            DeleteUserUseCase::class
        );

        $this->app->bind(
            GroupRepositoryInterface::class,
            GroupRepository::class
        );

        $this->app->bind(
            GetGroupUseCaseInterface::class,
            GetGroupUseCase::class
        );

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

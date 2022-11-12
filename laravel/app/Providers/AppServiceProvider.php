<?php

namespace App\Providers;

use App\Repositories\GroupRepository;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\UseCases\AuthUseCase;
use App\UseCases\DeleteGroupUseCase;
use App\UseCases\DeletePostUseCase;
use App\UseCases\DeleteUserUseCase;
use App\UseCases\GetGroupUseCase;
use App\UseCases\GetPostUseCase;
use App\UseCases\GetUserUseCase;
use App\UseCases\Interfaces\AuthUseCaseInterface;
use App\UseCases\Interfaces\DeleteGroupUseCaseInterface;
use App\UseCases\Interfaces\DeletePostUseCaseInterface;
use App\UseCases\Interfaces\DeleteUserUseCaseInterface;
use App\UseCases\Interfaces\GetGroupUseCaseInterface;
use App\UseCases\Interfaces\GetPostUseCaseInterface;
use App\UseCases\Interfaces\GetUserUseCaseInterface;
use App\UseCases\Interfaces\PostGroupUseCaseInterface;
use App\UseCases\Interfaces\PostPostUseCaseInterface;
use App\UseCases\Interfaces\PostUserUseCaseInterface;
use App\UseCases\Interfaces\PutGroupUseCaseInterface;
use App\UseCases\Interfaces\PutPostUseCaseInterface;
use App\UseCases\Interfaces\UpdateUserUseCaseInterface;
use App\UseCases\PostGroupUseCase;
use App\UseCases\PostPostUseCase;
use App\UseCases\PostUserUseCase;
use App\UseCases\PutGroupUseCase;
use App\UseCases\PutPostUseCase;
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

        $this->app->bind(
            PostGroupUseCaseInterface::class,
            PostGroupUseCase::class
        );

        $this->app->bind(
            PutGroupUseCaseInterface::class,
            PutGroupUseCase::class
        );

        $this->app->bind(
            DeleteGroupUseCaseInterface::class,
            DeleteGroupUseCase::class
        );

        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );

        $this->app->bind(
            GetPostUseCaseInterface::class,
            GetPostUseCase::class
        );

        $this->app->bind(
            PostPostUseCaseInterface::class,
            PostPostUseCase::class
        );

        $this->app->bind(
            PutPostUseCaseInterface::class,
            PutPostUseCase::class
        );

        $this->app->bind(
            DeletePostUseCaseInterface::class,
            DeletePostUseCase::class
        );

        $this->app->bind(
            AuthUseCaseInterface::class,
            AuthUseCase::class
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

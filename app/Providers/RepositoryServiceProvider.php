<?php

namespace App\Providers;

use App\Repositories\TenantRepository;
use App\Repositories\TenantRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contacts\{ChatInterface,
    CommentInterface,
    DesignInterface,
    InvitationInterface,
    MessageInterface,
    TeamInterface,
    UserInterface};
use App\Repositories\Eloquent\{ChatRepositories,
    CommentRepositories,
    DesignRepositories,
    InvitationRepositories,
    MessageRepositories,
    TeamRepositories,
    UserRepositories};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}

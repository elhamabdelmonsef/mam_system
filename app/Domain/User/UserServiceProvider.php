<?php

namespace App\Domain\User;

use App\Domain\User\Repository\RoleRepository;
use App\Domain\User\Repository\RoleRepositoryInterFace;
use App\Domain\User\Repository\UserRepository;
use App\Domain\User\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(RoleRepositoryInterFace::class, RoleRepository::class);
    }
}

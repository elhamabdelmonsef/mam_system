<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Model\User;

interface UserRepositoryInterface
{
    public function getUsers(?array $pagingInfo);

    public function saveUser(User $user);

    public function getUserById(int $id): User;

    public function deleteUser(User $user);
}

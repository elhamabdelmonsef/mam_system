<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Model\User;

class UserRepository implements UserRepositoryInterface
{
    protected $defaultPagination = ['number' => 1, 'size' => 500];

    public function getUsers(?array $pagingInfo)
    {
        $builder = User::query();

        if ($pagingInfo)
            return $builder->paginate(array_key_exists('size', $pagingInfo) ? $pagingInfo['size'] : $this->defaultPagination['size'],
                ['*'], null, array_key_exists('number', $pagingInfo) ? $pagingInfo['number'] : $this->defaultPagination['number']);

        return $builder->get();

    }

    public function saveUser(User $user)
    {
        return $user->save();
    }

    public function getUserById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }
}

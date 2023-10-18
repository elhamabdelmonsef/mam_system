<?php

namespace App\Domain\User;

use App\Domain\User\Model\User;
use App\Domain\User\Repository\RoleRepositoryInterFace;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Http\Resources\User\UserCollection;
use Illuminate\Support\Facades\Hash;

class UserLibrary
{
    private $userRepo;
    private $roleRepo;

    public function __construct(UserRepositoryInterface $userRepo, RoleRepositoryInterFace $roleRepo)
    {
        $this->userRepo = $userRepo;

        $this->roleRepo = $roleRepo;
    }

    public function getUsers($paginationInfo)
    {
        return new UserCollection ($this->userRepo->getUsers($paginationInfo));
    }

    public function createUser(array $input)
    {
        $user = new User();

        $user->fill($input);
        $user->password = Hash::make($input['password']);
        $user->role_id = $this->roleRepo->getRoleByName('Admin')->id;

        $this->userRepo->saveUser($user);

        return $user;
    }

    public function updateUser(User $user, array $input)
    {
        $user->fill($input);

        $this->userRepo->saveUser($user);

        return $user;
    }

    public function getUserById($id): User
    {
        return $this->userRepo->getUserById($id);
    }

    public function deleteUser(User $user)
    {
        return $this->userRepo->deleteUser($user);
    }
}

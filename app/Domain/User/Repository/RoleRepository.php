<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Model\Role;

class RoleRepository implements RoleRepositoryInterFace
{
    public function getRoleByName(?string $name) : Role
    {
        return Role::query()->where('name' , $name)->first();
    }
}

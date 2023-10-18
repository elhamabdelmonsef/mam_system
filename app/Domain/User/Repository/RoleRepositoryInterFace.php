<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Model\Role;

interface RoleRepositoryInterFace
{
    public function getRoleByName(?string $name): Role;
}

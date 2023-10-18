<?php

namespace App\Domain\Auth\Contract;

use Illuminate\Contracts\Auth\Authenticatable as BaseAuthenticatable;

interface Authenticatable extends BaseAuthenticatable
{
    const USER_TYPE_USER = 'user';


    public function getUserType();
}

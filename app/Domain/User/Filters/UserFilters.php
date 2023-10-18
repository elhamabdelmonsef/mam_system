<?php

namespace App\Domain\User\Filters;

use App\Domain\Common\Filters\BaseFilters;
use Illuminate\Database\Eloquent\Builder;

class UserFilters extends BaseFilters
{
    public function name(Builder $builder, $name)
    {
        return $builder->where('name', $name);
    }
}

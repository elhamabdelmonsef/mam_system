<?php

namespace App\Domain\Common\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FiltersInterface
{
    public function apply(Builder $builder): Builder;

    public function checkFilterExists($key): bool;
}

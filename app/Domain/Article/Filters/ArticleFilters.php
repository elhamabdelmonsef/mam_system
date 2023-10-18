<?php

namespace App\Domain\Article\Filters;

use App\Domain\Common\Filters\BaseFilters;
use Illuminate\Database\Eloquent\Builder;

class ArticleFilters extends BaseFilters
{
    public function user(Builder $builder, $userId)
    {
        return $builder->where('user_id', $userId);
    }
}

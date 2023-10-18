<?php

namespace App\Domain\Common\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class BaseFilters implements FiltersInterface
{
    protected $filters = [];

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function add($name, $value)
    {
        $this->filters[$name] = $value;

        return $this;
    }

    public function get($name)
    {
        return $this->filters[$name] ?? null;
    }

    public function apply(Builder $builder): Builder
    {
        foreach ($this->filters as $filterName => $filterValue) {
            if ($methodName = $this->getFilterMethod($filterName)) {
                $this->{$methodName}($builder, $filterValue);
            }
        }

        return $builder;
    }

    public function checkFilterExists($key): bool
    {
        return array_key_exists($key, $this->filters);
    }

    protected function getFilterMethod($filterName)
    {
        $methodName = Str::studly($filterName);

        return method_exists($this, $methodName) ? $methodName : null;
    }
}

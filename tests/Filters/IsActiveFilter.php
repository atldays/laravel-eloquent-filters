<?php

namespace Atldays\LaravelEloquentFilters\Tests\Filters;

use Atldays\LaravelEloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class IsActiveFilter extends AbstractEloquentFilter
{
    public function apply(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}

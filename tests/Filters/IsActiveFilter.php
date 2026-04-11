<?php

namespace Atldays\EloquentFilters\Tests\Filters;

use Atldays\EloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class IsActiveFilter extends AbstractEloquentFilter
{
    public function apply(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}

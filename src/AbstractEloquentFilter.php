<?php

namespace Atldays\EloquentFilters;

use Atldays\EloquentFilters\Contracts\EloquentFilterContract;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractEloquentFilter implements EloquentFilterContract
{
    abstract public function apply(Builder $query): Builder;

    public function isApplicable(): bool
    {
        return true;
    }
}

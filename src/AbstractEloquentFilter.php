<?php

namespace Atldays\LaravelEloquentFilters;

use Atldays\LaravelEloquentFilters\Contracts\EloquentFilterContract;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractEloquentFilter implements EloquentFilterContract
{
    abstract public function apply(Builder $query): Builder;

    public function isApplicable(): bool
    {
        return true;
    }
}

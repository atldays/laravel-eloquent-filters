<?php

namespace Atldays\EloquentFilters;

use Atldays\EloquentFilters\Contracts\EloquentFilterContract;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractEloquentFilter implements EloquentFilterContract
{
    /**
     * Applies modifications to the given query builder instance.
     *
     * @param  Builder  $query  The query builder instance to be modified.
     * @return Builder The modified query builder instance.
     */
    abstract public function apply(Builder $query): Builder;

    /**
     * Determines if the current context or configuration satisfies the necessary conditions
     * for applicability.
     *
     * @return bool Returns true if applicable, false otherwise.
     */
    public function isApplicable(): bool
    {
        return true;
    }
}

<?php

namespace Atldays\EloquentFilters;

use Atldays\EloquentFilters\Contracts\EloquentFilterContract;
use Illuminate\Database\Eloquent\Builder;
use Throwable;

trait Filterable
{
    /**
     * @throws Throwable
     */
    public function scopeFilter(Builder $query, EloquentFilters|EloquentFilterContract|iterable $filters): Builder
    {
        if ($filters instanceof EloquentFilterContract) {
            $filters = EloquentFilters::make([$filters]);
        } elseif (is_iterable($filters)) {
            $filters = EloquentFilters::make($filters);
        }

        return $filters->apply($query);
    }
}

<?php

namespace Atldays\LaravelEloquentFilters;

use Atldays\LaravelEloquentFilters\Contracts\EloquentFilterContract;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param  EloquentFilters|EloquentFilterContract|EloquentFilterContract[]  $filters
     */
    public function scopeFilter(Builder $query, EloquentFilters|EloquentFilterContract|array $filters): Builder
    {
        if ($filters instanceof EloquentFilterContract) {
            $filters = EloquentFilters::make([$filters]);
        } elseif (is_array($filters)) {
            $filters = EloquentFilters::make($filters);
        }

        return $filters->apply($query);
    }
}

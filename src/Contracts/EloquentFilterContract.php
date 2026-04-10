<?php

namespace Atldays\LaravelEloquentFilters\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface EloquentFilterContract
{
    public function apply(Builder $query): Builder;
}

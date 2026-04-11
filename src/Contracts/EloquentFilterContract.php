<?php

namespace Atldays\EloquentFilters\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface EloquentFilterContract
{
    public function apply(Builder $query): Builder;
}

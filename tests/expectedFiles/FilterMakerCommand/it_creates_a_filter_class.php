<?php

namespace App\Filters;

use Atldays\EloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class DummyFilter extends AbstractEloquentFilter
{
    public function apply(Builder $query): Builder
    {
        // your code
    }
}

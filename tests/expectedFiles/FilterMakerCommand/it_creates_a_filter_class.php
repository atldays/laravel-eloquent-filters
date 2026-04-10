<?php

namespace App\Filters;

use Atldays\LaravelEloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class DummyFilter extends AbstractEloquentFilter
{
    public function apply(Builder $query): Builder
    {
        // your code
    }
}

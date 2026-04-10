<?php

namespace App\Filters;

use Atldays\LaravelEloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class DummyFilter extends AbstractEloquentFilter
{
    protected $name;

    public function __constructor($name)
    {
        $this->name;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('name', 'like', "$this->name%");
    }
}

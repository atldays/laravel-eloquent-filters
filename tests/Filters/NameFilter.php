<?php

namespace Atldays\LaravelEloquentFilters\Tests\Filters;

use Atldays\LaravelEloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class NameFilter extends AbstractEloquentFilter
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('name', 'like', "%{$this->name}%");
    }
}

<?php

namespace Atldays\EloquentFilters\Tests\Filters;

use Atldays\EloquentFilters\AbstractEloquentFilter;
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

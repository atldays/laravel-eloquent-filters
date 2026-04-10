<?php

namespace Atldays\LaravelEloquentFilters\Tests\Filters;

use Atldays\LaravelEloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class LikeFilter extends AbstractEloquentFilter
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where($this->field(), 'like', "%$this->value%");
    }
}

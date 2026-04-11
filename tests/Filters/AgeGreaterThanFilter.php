<?php

namespace Atldays\EloquentFilters\Tests\Filters;

use Atldays\EloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class AgeGreaterThanFilter extends AbstractEloquentFilter
{
    protected ?int $age;

    public function __construct(?int $age)
    {
        $this->age = $age;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('age', '>', $this->age);
    }

    public function isApplicable(): bool
    {
        return $this->age !== null && is_int($this->age) && $this->age > 0;
    }
}

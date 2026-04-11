<?php

namespace Atldays\EloquentFilters\Tests\Filters;

use Atldays\EloquentFilters\AbstractEloquentFilter;
use Illuminate\Database\Eloquent\Builder;

class OccupationFilter extends AbstractEloquentFilter
{
    protected ?string $occupation;

    public function __construct(?string $occupation)
    {
        $this->occupation = $occupation;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('occupation', '=', $this->occupation);
    }

    public function isApplicable(): bool
    {
        return $this->occupation !== null;
    }
}

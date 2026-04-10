<?php

namespace Atldays\LaravelEloquentFilters\Tests\Filters;

use Atldays\LaravelEloquentFilters\AbstractEloquentFilter;
use Atldays\LaravelEloquentFilters\Contracts\ComposeableFilter;
use Atldays\LaravelEloquentFilters\Contracts\EloquentFilterContract;

class OccupationOrAgeFilter extends AbstractEloquentFilter implements ComposeableFilter, EloquentFilterContract
{
    protected ?int $age;

    protected ?string $occupation;

    public function __construct(?string $occupation, ?int $age)
    {
        $this->occupation = $occupation;
        $this->age = $age;
    }

    public function composedByUsingOr(): array
    {
        return [
            new OccupationFilter($this->occupation),
            new AgeGreaterThanFilter($this->age),
        ];
    }
}

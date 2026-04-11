<?php

namespace Atldays\EloquentFilters\Tests\Filters;

use Atldays\EloquentFilters\AbstractEloquentFilter;
use Atldays\EloquentFilters\Contracts\ComposeableFilter;
use Atldays\EloquentFilters\Contracts\EloquentFilterContract;

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

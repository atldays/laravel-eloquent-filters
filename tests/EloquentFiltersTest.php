<?php

namespace Atldays\LaravelEloquentFilters\Tests;

use Atldays\LaravelEloquentFilters\Contracts\EloquentFilterContract;
use Atldays\LaravelEloquentFilters\EloquentFilters;
use Atldays\LaravelEloquentFilters\Exceptions\EloquentFiltersException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EloquentFiltersTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_is_buit_off_of_the_eloquent_filters(): void
    {
        $filterA = $this->mock(EloquentFilterContract::class);
        $filterB = $this->mock(EloquentFilterContract::class);

        $filters = EloquentFilters::make([$filterA, $filterB]);

        $this->assertCount(2, $filters);
    }

    public function test_it_applies_all_the_filters(): void
    {
        $builder = new Builder(resolve(QueryBuilder::class));

        $filterA = $this->spy(EloquentFilterContract::class);
        $filterA->shouldReceive('isApplicable')->andReturnTrue();
        $filterA->shouldReceive('apply')->once()->with($builder);

        $filterB = $this->spy(EloquentFilterContract::class);
        $filterB->shouldReceive('isApplicable')->andReturnTrue();
        $filterB->shouldReceive('apply')->once()->with($builder);

        $filters = EloquentFilters::make([$filterA, $filterB]);

        $builder = $filters->apply($builder);
    }

    public function test_it_doesnt_apply_inapplicable_filters(): void
    {
        $builder = new Builder(resolve(QueryBuilder::class));

        $filterA = $this->spy(EloquentFilterContract::class);
        $filterA->shouldReceive('isApplicable')->andReturnFalse();
        $filterA->shouldNotReceive('apply');

        $filterB = $this->spy(EloquentFilterContract::class);
        $filterB->shouldReceive('isApplicable')->andReturnTrue();
        $filterB->shouldReceive('apply')->once()->with($builder);

        $filters = EloquentFilters::make([$filterA, $filterB]);

        $builder = $filters->apply($builder);
    }

    public function test_it_throws_an_exception_when_composed_with_non_filterable_contracts(): void
    {
        $builder = new Builder(resolve(QueryBuilder::class));

        $filterA = $this->spy(EloquentFilterContract::class);
        $filterB = new class {};

        try {
            $filters = EloquentFilters::make([$filterA, $filterB]);
        } catch (EloquentFiltersException $e) {
            $this->assertStringContainsString('Filter must implement EloquentFilterContract', $e->getMessage());

            return;
        }

        $this->fail('Exception was not thrown when building a filters object with non-filter');
    }
}

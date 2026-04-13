<?php

namespace Atldays\EloquentFilters;

use Atldays\EloquentFilters\Contracts\EloquentFilterContract;
use Atldays\EloquentFilters\Exceptions\EloquentFiltersException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Throwable;

class EloquentFilters extends Collection
{
    /**
     * @param  iterable<int, EloquentFilterContract>  $items
     *
     * @throws Throwable
     */
    public function __construct(iterable $items = [])
    {
        static::validateParameters($items);

        parent::__construct($items);
    }

    /**
     * @param  iterable<int, EloquentFilterContract>  $items
     *
     * @throws Throwable
     */
    public static function make($items = [], ...$args): static
    {
        static::validateParameters($items);

        return parent::make($items, ...$args);
    }

    public function apply(Builder $builder): Builder
    {
        $this
            ->removeNotApplicable()
            ->each(fn ($filter) => $filter->apply($builder));

        return $builder;
    }

    /**
     * @return mixed
     */
    public function removeNotApplicable(): static
    {
        return $this->filter->isApplicable();
    }

    /**
     * @param  iterable<int, mixed>  $items
     *
     * @throws Throwable
     */
    protected static function validateParameters(iterable $items): void
    {
        collect($items)->each(fn ($item) => throw_unless(
            $item instanceof EloquentFilterContract,
            new EloquentFiltersException('Filter must implement EloquentFilterContract')
        ));
    }
}

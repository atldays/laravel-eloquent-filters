<?php

namespace Atldays\EloquentFilters\Database\Factories;

use Atldays\EloquentFilters\Tests\Models\FilterableModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilterableModelFactory extends Factory
{
    /** @var class-string<FilterableModel> */
    protected $model = FilterableModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'text' => $this->faker->text,
            'is_active' => true,
        ];
    }
}

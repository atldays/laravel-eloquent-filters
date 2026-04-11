<?php

namespace Atldays\EloquentFilters\Tests;

use Atldays\EloquentFilters\EloquentFiltersServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public static $latestResponse = null;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Atldays\\EloquentFilters\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            EloquentFiltersServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
        $this->createTables('filterable_models');
    }

    protected function createTables(string ...$tableNames): void
    {
        collect($tableNames)->each(function (string $tableName) {
            Schema::create($tableName, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('text')->nullable();
                $table->string('occupation')->nullable();
                $table->integer('age')->nullable();
                $table->boolean('is_active')->default(false);
                $table->timestamps();
                $table->softDeletes();
            });
        });
    }

    public function filtersPath(string $path = ''): string
    {
        return app_path('Filters'.($path ? "/$path" : ''));
    }

    public function expectedFilesPath(string $path): string
    {
        return dirname(__FILE__).'/expectedFiles'.($path ? "/$path" : '');
    }
}

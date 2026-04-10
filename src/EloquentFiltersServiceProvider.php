<?php

namespace Atldays\LaravelEloquentFilters;

use Atldays\LaravelEloquentFilters\Commands\FilterMakeCommand;
use Illuminate\Support\ServiceProvider;

class EloquentFiltersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([FilterMakeCommand::class]);
        }
    }
}

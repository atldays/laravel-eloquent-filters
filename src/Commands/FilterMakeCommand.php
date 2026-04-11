<?php

namespace Atldays\EloquentFilters\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Input\InputOption;

class FilterMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:eloquent-filter {name : The name of the filter}
    {--field= : The name of the Filter that should be created}';

    protected $description = 'Create a Eloquent Filter Class';

    /**
     * The type of class being generated.
     */
    protected $type = 'Filter';

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        if ($this->option('field')) {
            return dirname(__DIR__, 2).'/stubs/filter.field.stub';
        }

        return dirname(__DIR__, 2).'/stubs/filter.stub';
    }

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Filters';
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['name' => InputOption::VALUE_REQUIRED, 'Name of the Filter that should be created'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['field' => InputOption::VALUE_OPTIONAL, 'The name of the Filter field'],
        ];
    }

    /**
     * Build the class with the given name.
     *
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceField($stub, $this->option('field'))
            ->replaceClass($stub, $name);
    }

    public function replaceField(string &$stub, ?string $field): self
    {
        if ($field) {
            $stub = str_replace('{{ field }}', $field, $stub);
        }

        return $this;
    }
}

<?php

namespace Atldays\LaravelEloquentFilters\Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;

class FilterMakeCommandTest extends TestCase
{
    protected string $filterName;

    protected function setUp(): void
    {
        parent::setUp();
        $this->filterName = 'DummyFilter';
        File::delete($this->filtersPath("$this->filterName.php"));
    }

    #[Test]
    public function it_creates_a_filter_class(): void
    {
        Artisan::call('make:eloquent-filter', [
            'name' => $this->filterName,
        ]);

        $expectedFile = $this->expectedFilesPath('FilterMakerCommand/it_creates_a_filter_class.php');
        $resultFile = $this->filtersPath("$this->filterName.php");

        $this->assertFileEquals($expectedFile, $resultFile);
    }

    #[Test]
    public function it_inline_creates_a_filter_class(): void
    {
        Artisan::call("make:eloquent-filter {$this->filterName}");

        $expectedFile = $this->expectedFilesPath('FilterMakerCommand/it_creates_a_filter_class.php');
        $resultFile = $this->filtersPath("$this->filterName.php");

        $this->assertFileEquals($expectedFile, $resultFile);
    }

    #[Test]
    public function it_creates_a_filter_class_with_field_name(): void
    {
        Artisan::call('make:eloquent-filter', [
            'name' => $this->filterName,
            '--field' => 'name',
        ]);
        $expectedFile = $this->expectedFilesPath('FilterMakerCommand/it_creates_a_filter_class_with_field_name.php');
        $resultFile = $this->filtersPath("$this->filterName.php");

        $this->assertFileEquals($expectedFile, $resultFile);
    }

    #[Test]
    public function it_inline_creates_a_filter_class_with_field_name(): void
    {
        Artisan::call("make:eloquent-filter {$this->filterName} --field=name");
        $expectedFile = $this->expectedFilesPath('FilterMakerCommand/it_creates_a_filter_class_with_field_name.php');
        $resultFile = $this->filtersPath("$this->filterName.php");

        $this->assertFileEquals($expectedFile, $resultFile);
    }
}

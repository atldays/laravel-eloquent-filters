<?php

namespace Atldays\LaravelEloquentFilters\Tests\Models;

use Atldays\LaravelEloquentFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterableModel extends Model
{
    use Filterable;
    use HasFactory;

    /** @var list<string> */
    protected $guarded = [];
}
